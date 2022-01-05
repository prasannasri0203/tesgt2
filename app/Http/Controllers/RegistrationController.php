<?php
/********************************************************************************
 * @class                    RegistrationController.
 * @Description              which is used to store the registration data.
 * @author                   prasanna
 * @created date             mar 2021
 *********************************************************************************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Session;

class RegistrationController extends Controller
{

    public $email;
    
    public function mainPage(){
       
       return view('main_page');
    }
    public function registration()
    {

        return view("registration");
    }

    public function successContentMsg()
    {

        return view("content_success_msg");
    }

     public function failureContentMsg()
    {

        return view("content_failure_message");
    }

    public function store(Request $request)
    {
        $request->validate([
                'first' => 'required', 
                'last' => 'required', 
                'email' => 'required|email',
                'country_code' => 'required',
                'mobile_number' => 'required',
                // 'supporting_document' => 'required|mimes:jpeg,jpg,png',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password'],

                ['first.required' => 'First Name is Required', 
                'last.required' => 'Last Name is Required', 
                'email.required' => 'Email is Required', 
                'country_code.required' => 'Country Code is Required',
                'mobile_number.required' => 'Mobile Number is Required',
                // 'supporting_document.required' =>'Supporting Document is Required',
                // 'supporting_document.mimes' =>'It is only support the png,jpg and jpeg',
                'password.required' => 'Password is Required', 
                'password_confirmation.required' => 'Confirm Password is Required',
                'password_confirmation.same' => 'Confirm Password does not match']);

        $date = date("m/d/Y");
        $jsonData = '{"field_290":{"first":"' . $request->first . '",
                    "last":"' . $request->last . '"},
                    "field_291":{"email":"' . $request->email . '"},
                    "field_292":{"password":"' . $request->password . '",
                    "password_confirmation":"' . $request->password_confirmation . '"},
                    "field_293":"pending approval",
                    "send_email_intro":"' . $request->send_email_intro . '",
                    "field_294":["' . $request->field_294 . '"],
                    "field_304":{"date":"' . $date . '"},
                    "field_310":"' . $request->mobile_number . '",
                    "format":"html"}';

        $url = 'https://api.knack.com/v1/objects/object_30/records';
        //calling the curl functionality
        $response = $this->curl($url, $jsonData, 'registration');
        $data = json_decode($response, true);

        if (isset($data['id']) && $data['id'] != '')
        {
            $this->email = $request->email;
            $userName = $request->first . " " . $request->last;
            session()->put("name", $userName);

            $request->mobile_number = preg_replace('/[^A-Za-z0-9\-]/', '', $request->mobile_number);
            $request->mobile_number = str_replace("-", "", $request->mobile_number);
            $this->mobileNumber = $request->country_code . $request->mobile_number;
        
            // if(file_exists($request->file('supporting_document'))){

            //     $url = 'https://api.knack.com/v1/objects/object_30/records/'.$data['id'];
            
            //     $jsonData = '{"field_311":"'.$request->field_305_files.'"}';

            //     $ch = curl_init();
            //     curl_setopt($ch, CURLOPT_URL,$url);
            //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
            //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            //     curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
            //     // Receive server response ...
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //     $server_output = curl_exec($ch);
            //     curl_close ($ch);
            // }

            //generate url for document verification
            Log::info($request->email);
            $url = $this->verify($request->email);
            Log::info($url);
            if ($url)
            {
                return redirect($url);
            }
         
         }
        else if (isset($data['errors']))
        {
            $msg = array();
            foreach ($data['errors'] as $key => $value)
            {
                if ($value['field'] == "field_310")
                {
                    $msg["mobile_number"] = "The number is already exist";
                }
                if ($value['field'] == "field_20")
                {
                    $msg["email"] = "The number is already exist";
                }
            }

            if (isset($msg["email"]) && isset($msg["mobile_number"]))
            {
                return back()->with('failed_email', $msg["email"])->with('failed_mobile_number', $msg["mobile_number"])->withInput();
            }
            else if (isset($msg["email"]))
            {
                return back()->with('failed_email', $msg["email"])->withInput();
            }
            else if (isset($msg["mobile_number"]))
            {
                return back()->with('failed_mobile_number', $msg["mobile_number"])->withInput();
            }
        }
    }

    public function verify($email)
    {

        $OtpNumber = mt_rand(1000, 9999);

        //method to send CURL request
        function send_curl($url, $post_data, $headers, $auth)
        {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_USERPWD, $auth);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $html_response = curl_exec($ch);
            $curl_info = curl_getinfo($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers = substr($html_response, 0, $header_size);
            $body = substr($html_response, $header_size);
            curl_close($ch);
            return ['headers' => $headers, 'body' => $body];
        }

        //following method is to get response headers, here the main intention is to get response Signature from the response headers
        function get_header_keys($header_string)
        {

            $headers = [];
            $exploded = explode("\n", $header_string);
            if (!empty($exploded))
            {
                foreach ($exploded as $key => $header)
                {
                    if (!$key)
                    {
                        $headers[] = $header;
                    }else{

                        $header = explode(':', $header);
                        $headers[trim($header[0]) ] = isset($header[1]) ? trim($header[1]) : "";
                    }
                }
            }
            return $headers;
        }

        //  Shufti Pro API base URL
        $url = 'https://api.shuftipro.com/';
        //your Shufti Pro account Client ID
        $client_id = 'a5f5363e323743c647369d30dbfa8121500b42a7c8e9693c84105c164900fbc5';

        //your Shufti Pro account Secret Key
        $secret_key = 'NmUtZo7CIfQHEyt9w5FrfPgqDH5v6rPW';

        $verification_request = [
        //your unique request reference
        "reference" => 'ref-' . rand(4, 444) . rand(4, 444) ,
        //URL where you will receive the webhooks from Shufti profile
        "callback_url" => 'https://zakah.colanapps.in/profile/notifyCallback',
        //end-user email
        "email" => "$email",
        //end-user country
        "country"                         => "US",
        // "country" => "",

        // "language"    => "EN",
        //URL where end-user will be redirected after verification completed
        "redirect_url" => "https://zakah.colanapps.in/contents",
        //what kind of proofs will be provided to Shufti Pro for verification?
        // "verification_mode"       => "any",
        "verification_mode" => "image_only",
        //allow end-user to upload verification proofs if the webcam is not accessible
        "allow_offline" => "1",
        //allow end user to upload real-time or already catured proofs
        "allow_online" => "1",
        //privacy policy screen will be shown to end-user
        "show_privacy_policy" => "1",
        //verification results screen will be shown to end-user
        "show_results" => "1",
        //consent screen will be shown to end-user
        "show_consent" => "1",
        //User can send Feedback
        "show_feedback_form" => "0",

        // "verification_instructions" => {
        //     "allow_laminated"=>"1",
        //     "allow_photocopy"=>"1",
        //     "allow_paper_based" => "1",
        // },
        ];

        //phone verification
        $verification_request['phone'] = ['phone_number' => "$this->mobileNumber", 'random_code' => "$OtpNumber", 'text' => 'Your verification code is ' . "$OtpNumber"];

        // //face onsite verification
        $verification_request['face'] = [];
        //document onsite verification with OCR
        $verification_request['document'] = [
        // 'name'                           => "",
        // 'dob'                                => "",
        // 'gender'                             => "",
        // 'place_of_issue'                             => "",
        'document_number' => "", 'expiry_date' => "",
        // 'issue_date'                 => "",
        'fetch_enhanced_data' => "1",
        // 'supported_types'        => ['id_card','passport'],
        'supported_types' => ['id_card', 'driving_license', 'passport']];
        // //address onsite verification with OCR
        // $verification_request['address'] = [
        //      'name'                              => "",
        //      'full_address'                  => "",
        //      'address_fuzzy_match'   => '1',
        //      'issue_date'                        => "",
        //      'supported_types'           => ['utility_bill','passport','bank_statement']
        // ];
        //consent onsite verification
        // $verification_request['consent'] =[
        //      'text'                       => 'some text for consent verificaiton',
        //      'supported_types' => ['handwritten','printed'],
        // ];
        $auth = $client_id . ":" . $secret_key;
        $headers = ['Content-Type: application/json'];
        $post_data = json_encode($verification_request);
        //Calling Shufti Pro request API using curl
        $response = send_curl($url, $post_data, $headers, $auth);

        //get Shufti Pro API Response
        $response_data = $response['body'];

        // $data = explode("signature:",$response['headers']);
        // $data = explode(" ",$data[1]);
        // $signature = explode("X-RateLimit-Limit:",$data[1]);
        // $signature = $signature[0];
        //get Shufti Pro Signature
        // $sp_signature        = get_header_keys($signature);
        // $sp_signature        = get_header_keys($response['headers']['signature']);
        //calculating signature for verification
        // $calculate_signature  = hash('sha256',$response_data.$secret_key);
        $decoded_response = json_decode($response_data, true);
        $event_name = $decoded_response['event'];

        if ($event_name == 'request.pending')
        {
            $verification_url = $decoded_response['verification_url'];
            return $verification_url;
        }
        else
        {

            $responseData = json_decode($response_data);
            echo $responseData
                ->error->message;
        }
    }

    public function getResponse(Request $request)
    {
        // public function getResponse() {
        $responseData['event'] = '';
        // $responseData =  array ('event' => 'verification.accepted','email' =>
        // 'pra33ivasan@yopmail.com');
        Log::info($request);
        if ($request != '')
        {
            Log::info("Request of if condition");
            $responseData = $request;
        }
        

        Log::info($responseData['email']);
        
        if ($responseData['event'] == 'verification.accepted')
        {
            Log::info("if");
            Log::info($responseData);

            $url = 'https://api.knack.com/v1/objects/object_30/records?filters=[{"field":"field_291","operator":"is","value":"' . $responseData['email'] . '"}]';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
            ));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_POSTFIELDS, '');
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);

            $responseRecord = json_decode($server_output, true);

            if ($responseRecord)
            {
                Log::info("if_1");
                Log::info($responseRecord);
                $recordsId = '';
                foreach ($responseRecord['records'] as $records)
                {

                    $recordsId = $records['id'];
                }

                if ($recordsId != '')
                {
                    Log::info("if_2");
                    Log::info($recordsId);
                    $url = 'https://api.knack.com/v1/objects/object_30/records/' . $recordsId;
                    $jsonData = '{"field_293": "active"}';

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json',
                        'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                        'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
                    ));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = curl_exec($ch);
                    curl_close($ch);
                    $response = json_decode($server_output, true);

                    if ($response)
                    {
                        $emailId = $responseData['email'];
                        Session::put('userName', $response['field_290']);
                        Log::info("if_3");
                        Log::info($response);
                        \Mail::send('registration_success', $response, function ($message) use ($emailId)
                        {
                            $message->from('info@zakah-network.com', "Admin");
                            $message->to($emailId);
                            $message->subject('Zakah Registration Status');
                        });
                    }
                }
            }
        }
        else
        {
            if($responseData['event'] != 'request.pending')
            {

                // if ($responseData['event'] == 'request.invalid' || $responseData['event'] == 'verification.declined' || $responseData['event'] == 'verification.cancelled')
                // {
                    Log::info("elseif");
                    Log::info($responseData);

                    $emailId = $responseData['email'];

                    if ($emailId != '')
                    {
                        $data = [1, 2];
                        \Mail::send('registration_failure', $data, function ($message) use ($emailId)
                        {
                            $message->from('info@zakah-network.com', "Admin");
                            $message->to($emailId);
                            $message->subject('Zakah Registration Status');
                        });
                    }

                    $url = 'https://api.knack.com/v1/objects/object_30/records?filters=' . urlencode('[{"field":"field_291","operator":"is","value":"' . $responseData['email'] . '"}]');

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                        'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
                    ));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, '');
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
                    $server_output = curl_exec($ch);
                    curl_close($ch);
                    $getData = json_decode($server_output, true);

                    $id = $getData['records'][0]['id'];
                    if ($id != '')
                    {
                        Log::info("elseif1");
                        Log::info($id);

                        $url = 'https://api.knack.com/v1/objects/object_30/records/' . $id;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Content-Type:application/json',
                            'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                            'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
                        ));
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
                        // Receive server response ...
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $server_output = curl_exec($ch);
                        curl_close($ch);
                        $data = json_decode($server_output, true);

                        //All user
                        $url = 'https://api.knack.com/v1/objects/object_3/records?filters=' . urlencode('[{"field":"field_20","operator":"is","value":"' . $responseData['email'] . '"}]');

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                            'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
                        ));
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
                        // Receive server response ...
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
                        $server_output = curl_exec($ch);
                        curl_close($ch);
                        $getData = json_decode($server_output, true);

                        if (!empty($getData['records']))
                        {
                            Log::info("elseif2");
                            Log::info($getData);
                            $id = $getData['records'][0]['id'];
                        }

                        if (isset($id) && $id != '')
                        {
                            Log::info("elseif3");
                            Log::info($id);

                            $url = 'https://api.knack.com/v1/objects/object_3/records/delete';

                            $jsonData = '{"ids": "' . $id . '"}';

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Content-Type:application/json',
                                'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
                                'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
                            ));
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
                            // Receive server response ...
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $server_output = curl_exec($ch);
                            curl_close($ch);
                            $response = json_decode($server_output, true);
                            if ($response)
                            {
                                $emailId = $responseData['email'];
                                if (isset($response) && isset($response['field_20']) && $response['field_20'] != '')
                                {
                                    Log::info($response);
                                    Session::set('userName', $response['field_20']);
                                    Log::info("elseif4");
                                    \Mail::send('registration_failure', $response, function ($message) use ($emailId)
                                    {
                                        $message->from('info@zakah-network.com', "Admin");
                                        $message->to($emailId);
                                        $message->subject('Zakah Registration Status');
                                    });
                                }

                            }
                        // }
                    }
                }
            }
            // } else {
            //     Log::info("Something went to wrong...");
            //     Log::info($responseData);
            
        }
    }

    public function registerOrFailed($mailId)
    {

        $url = 'https://api.knack.com/v1/objects/object_3/records?filters=[{"field":"field_20","operator":"is","value":"' . $mailId . '"}]';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Knack-Application-Id:59c99d5c6b83d222c7507c61',
            'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output, true);
    }

    public function contents()
    {
        return view("return_content");
    }

    function accessToken()
    {

        function send_curl($url, $headers, $auth)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_USERPWD, $auth);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            $html_response = curl_exec($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers = substr($html_response, 0, $header_size);
            $body = substr($html_response, $header_size);
            curl_close($ch);
            return ['headers' => $headers, 'body' => $body];
        }

        $url = 'https://api.shuftipro.com/get/access/token';
        //Your Shufti Pro account Client ID
        $client_id = 'a5f5363e323743c647369d30dbfa8121500b42a7c8e9693c84105c164900fbc5';
        //Your Shufti Pro account Secret Key
        $secret_key = 'NmUtZo7CIfQHEyt9w5FrfPgqDH5v6rPW';

        $auth = $client_id . ":" . $secret_key;
        $headers = ['Content-Type: application/json'];
        //Calling Shufti Pro request API using curl
        $response = send_curl($url, $headers, $auth);
        //Get Shufti Pro API Response
        $response_data = $response['body'];
        //Get Shufti Pro Signature
        $exploded = explode("\n", $response['headers']);
        // Get Signature Key from Hearders
        $sp_signature = trim(explode(':', $exploded[6]) [1]);

        //Calculating signature for verification
        $calculate_signature = hash('sha256', $response_data . $secret_key);

        if ($sp_signature == $calculate_signature)
        {
            echo "Response :" . $response_data;
        }
        else
        {
            echo "Invalid signature :" . $response_data;
        }
    }

    // $this->deleteShuftiproRecord($responseData['reference']);
    
    public function deleteShuftiproRecord()
    {
        Log::info("delete_1");

        function send_curl($url, $post_data, $headers, $auth)
        { // remove $auth in case of Access Token
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_USERPWD, $auth); // remove this in case of Access Token
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // remove this in case of Access Token
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $html_response = curl_exec($ch);
            $curl_info = curl_getinfo($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers = substr($html_response, 0, $header_size);
            $body = substr($html_response, $header_size);
            curl_close($ch);
            return ['headers' => $headers, 'body' => $body];
        }

        $reference = 'ref-211125';

        $url = 'https://api.shuftipro.com/delete';

        //Your Shufti Pro account Client ID
        $client_id = 'a5f5363e323743c647369d30dbfa8121500b42a7c8e9693c84105c164900fbc5';
        //Your Shufti Pro account Secret Key
        $secret_key = 'NmUtZo7CIfQHEyt9w5FrfPgqDH5v6rPW';
        //OR Access Token
        //$access_token = 'YOUR-ACCESS-TOKEN';
        $delete_request = ["reference" => $reference, "comment" => "Customer asked to delete his/her data"];

        $auth = $client_id . ":" . $secret_key; // remove this in case of Access Token
        $headers = ['Content-Type: application/json'];
        // if using Access Token then add it into headers as mentioned below otherwise remove access token
        // array_push($headers, 'Authorization : Bearer ' . $access_token);
        $post_data = json_encode($delete_request);

        //Calling Shufti Pro request API using curl
        $response = send_curl($url, $post_data, $headers, $auth); // remove $auth in case of Access Token
        //Get Shufti Pro API Response
        $response_data = $response['body'];

        //Get Shufti Pro Signature
        $exploded = explode("\n", $response['headers']);
        // Get Signature Key from Hearders
        $sp_signature = trim(explode(':', $exploded[6]) [1]);

        //Calculating signature for verification
        # calculated signature functionality cannot be implement in case of access token
        $calculate_signature = hash('sha256', $response_data . $secret_key);
        Log::info($response);
        if ($sp_signature == $calculate_signature)
        {
            Log::info($response_data);
            echo "Response : $response_data";
        }
        else
        {
            Log::info($response_data);
            echo "Invalid signature :  $response_data";
        }
    }
}
?>
