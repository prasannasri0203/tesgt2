<?php
/********************************************************************************
* @class                    DashboardController.
* @Description              which is used to store the appalication data.
* @author                   prasanna
* @created date             mar 2021
*********************************************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Requests\ApplicationRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Mail;

class DashboardController extends Controller
{   
    public function dashboard(Request $request) {

        $datas = $this->getParticipatingMasjids();
        $getRegistration = $this->getRegistrationDetails();

        $primaryResaons = ["Rent","Utilities","Medical Bills","Groceries/Food","Emergency Travel","Transportation","Funeral Expenses","Zakat-ul-Fitr Recipient","other"];
        $zakahCategorys = ["Poor (Homeless, no income)","Needy (Individual in difficulty, low income)","New Muslims/Dawah","Debtor","Traveler","Zakat-ul-Fitr Recipient"];
        $skills = ["Sewing","Arts & Crafts","Painting","Tutoring - Math","Tutoring - Science","Tutoring - English","Tutoring - Arabic","Tutoring - Spanish","Cooking","Cleaning","Computer Programming","Labor - lawn mowing","Labor - carpentry","Labor - general home repair","Labor - specialized","Babysitting","Administrative Assistant (Paperwork)","Other"];
        return view('zakah_applicant',compact('datas','primaryResaons','zakahCategorys','skills','getRegistration'));
    }
    //store the application data
    public function store(ApplicationRequest $request) 
    {
            //majid field
            $majidFields = explode("/",$request->field_141);
            $svgImage = '';
            $data = '';
            //convert into svg format
            if ($request->svg !='') {
            
                $svgImage = stream_get_contents(fopen($request->svg,'r'));
                $data = '';
            }
            //trim the textarea
            $textareaData  = trim(strip_tags($request->field_108));

            //jsondata
            $jsonData = '{
                "field_7":{
                "first":"'.$request->first.'",
                "last":"'.$request->last.'"
                },
                "field_141":["'.$majidFields[0].'"],
                "field_9":{
                "street":"'.$request->street.'",
                "city":"'.$request->city.'",
                "state":"'.$request->state.'",
                "zip":"'.$request->zip.'"
                },
                "field_10":{
                "email":"'.$request->email.'"
                },
                "field_11":"'.$request->field_11.'",
                "field_106":"'.$request->field_106.'",
                "field_108":"'.$textareaData.'",
                "field_112":"'.$request->field_112.'",
                "field_114":"'.$request->field_114.'",
                "field_120":"'.$request->field_120.'",
                "field_216":"'.$request->field_216.'",
                "field_217":"'.$request->field_217.'",
                "field_218":"'.$request->field_218.'",
                "field_221":"'.$request->field_221.'",
                "field_245":"'.$request->field_245.'",
                "field_246":"'.$request->field_246.'",
                "field_248":{
                "first":"'.$request->first_field_248.'",
                "last":"'.$request->last_field_248.'"
                },
                "field_249":"'.$request->field_249.'",
                "field_289":"'.$request->field_289.'",
                "field_257":"'.$request->field_257.'",
                "field_266":"'.$request->field_266.'",
                "field_267":{
                "svg":"'.$data.'"
                },
                "field_276":"'.$request->field_276.'",
                "field_277":"'.$request->field_277.'",
                "field_278":"'.$request->field_278.'",
                "field_308":"false",
                "field_306":"'.$request->field_306.'",
                "crumbtrail":{
                },
                "url":"https://z-network.knack.com/test#zakah-user-registration/",
                "parent_url":"https://z-network.knack.com/test#"
            }';
           // "street2":"'.$request->street2.'",
            if ($svgImage != '') {
                $js =  json_decode($jsonData);
                $js->field_267->svg = $svgImage;
                $jsonData=json_encode($js);
            }
    
            $url = "https://api.knack.com/v1/scenes/scene_341/views/view_617/records/";

            $response = $this->curl($url,$jsonData,'add');

            $responseData = json_decode($response,true);
            
            if(isset($responseData['record']['id'])) {

                if(file_exists($request->file('files'))){
                    
                    $url = 'https://api.knack.com/v1/objects/object_2/records/'.$responseData['record']['id'];
                    
                    $jsonData = '{"field_305":"'.$request->field_305_files.'"}';

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = curl_exec($ch);
                    curl_close ($ch);
                }
                //generate pdf
                $this->createPDF($request->all(),$majidFields);
                $filterData = $this->filters();
            }
          
            if (isset($filterData['records'][0]['id'])) {

                $recordId=$filterData['records'][0]['id'];
                Session::put('recordId',$recordId);
                $updateRegistration ='';
                // $updateRegistration=$this->updateRegistrationFields($majidFields);
            }
            
            if (isset($responseData['errors'][0]['message'] ) && $responseData['errors'][0]['message'] !='') {

                return back()->with('failed',$responseData['errors'][0]['message'])->withInput();
                
            } else if (isset($responseData['record']['id']) || isset($updateRegistration)) {

                $email = $request->email;
                $fullName = $request->first." ".$request->last;

                return view('zakah_success_msg',compact('email','fullName'));
             }
     }

    public function getParticipatingMasjids () {
      
        $url = 'https://api.knack.com/v1/objects/object_1/records';
        // $url = 'https://api.knack.com/v1/scenes/scene_341/views/view_617/connections/field_141';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
        $server_output = curl_exec($ch);
        curl_close ($ch);
        // print_r($server_output);exit;
        return json_decode($server_output,true);
    }
    
    public function filters () {
        
        $loginMailId = Session::get('loginMailId');
       
        $url = 'https://api.knack.com/v1/objects/object_30/records?filters=[{"field":"field_291","operator":"is","value":"'.$loginMailId.'"}]';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output,true);
    }

    // public function updateRegistrationFields($majidFields) {
      
    //     $id=Session::get("recordId");
      
    //     $url = "https://api.knack.com/v1/objects/object_30/records/".$id;
    //     // print_r($url);exit;
        
    //     switch ($majidFields[1]) {
    //         case "ADAMS":
    //             $jsonData = '{"field_303":[{"id":"606dcc42b837d4001b74b756","identifier":"<span class=\"59cb15185f6b3120e73e02e8\">ADAMS</span>"}]}';
    //             break;
    //         case "ICNA VA":
    //             $jsonData = '{"field_303":[{"id":"606e972c4e62d100214dcaaa","identifier":"<span class=\"59cb152d8fe60b20e7cd5f99\">ICNA VA</span>"}]}';
    //             break;
    //         case "Mustafa Center":
    //             $jsonData = '{"field_303":[{"id":"606d959b34c24f001d67bc77","identifier":"<span class=\"59cb1638885d7920e6e8a461\">Mustafa Center</span>"}]}';
    //             break;
    //         case "ICNVT":
    //             $jsonData = '{"field_303":[{"id":"606eb533681634001b411759","identifier":"<span class=\"59cb15228a900a20e81022a1\">ICNVT</span>"}]}';
    //             break;
    //         case "McLean Islamic Center":
    //             $jsonData = '{"field_303":[{"id":"606ebd5f1f4594001b44c14b","identifier":"<span class=\"59cb154edf648c20feda7d62\">McLean Islamic Center</span>"}]}';
    //             break;
    //         case "Muslim Association of Virginia":
    //             $jsonData = '{"field_303":[{"id":"606ebe2b29f28c001cf1659c","identifier":"<span class=\"59cb16515f6b3120e73e03e3\">Muslim Association of Virginia</span>"}]}';
    //             break;
    //         case "Dar-al-Hijrah":
    //             $jsonData = '{"field_303":[{"id":"6075acc96b0b42001cd05735","identifier":"<span class=\"59cb1540f9726d20e28f897f\">Dar-al-Hijrah</span>"}]}';
    //             break;
    //     }
    //     // 606eb446daeb72001bd7b4c6
        
    //     // $jsonData = '{"field_303":[{"id":"59cfa321fb154e260e88e612","identifier":"<span class=\"59cb1540f9726d20e28f897f\">Dar-al-Hijrah</span>"}]}';
    //     // $jsonData = '{"field_303":[{"id":"'.$majidFields[0].'","identifier":"<span>'.$majidFields[1].'</span>"}]}';
          
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL,$url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
    //     // Receive server response ...
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $server_output = curl_exec($ch);
    //     curl_close ($ch);
    //     return json_decode($server_output,true);
    // }
    // Generate PDF
    public function createPDF($data,$majidFields) {

        if (isset($majidFields[1])) {
           
            $data['majidFields'] =$majidFields[1];
        } else {
            $data['majidFields'] ='';
        }
        
        //submission date
        $data['submissionData'] = date("m/d/Y");
      
        //trim the textarea
        $data['field_108']  = strip_tags($data['field_108']);
        
        $data['majidMailId'] = strip_tags($majidFields[2]);
        
        if (isset($data['svg']) && $data['svg'] !='') {
            $svgImage = stream_get_contents(fopen($data['svg'],'r'));
            $htmlImage = '<img src="data:image/svg+xml;base64,'.base64_encode($svgImage).'"  width="100" height="30" />';
            $data['image'] = $htmlImage;
            // $data['image_svg'] = $svgImage;
        }  
        $pdfPassword = "Test@123";
        view()->share('data',$data);
        $pdf = PDF::loadView('applicant_pdf',$data);
        // download PDF file with download method
        $path = public_path('pdf_file');
        $fileName =  'info.pdf';
        $pdf->setEncryption($pdfPassword);
        $pdf->save($path . '/' . $fileName);
        $pdf->download($fileName);
    
        if(!empty($data['majidMailId'])) {

            $ccMail = 'mubarakali.akbar@colanonline.com';
            
            \Mail::send('applicant_mail', $data, function ($message) use ($pdf, $data,$ccMail) {
                $message->from('info@zakah-network.com', "Admin");
                $message->to($data['majidMailId'])->cc($ccMail);
                $message->subject('Zakah Applicant Form');
                $message->attachData($pdf->output(), 'applicant_zakah.pdf');
            });
        }
    }
    
    public function getRegistrationDetails () {
        
        $loginMailId = Session::get('loginMailId');
       
        $url = 'https://api.knack.com/v1/objects/object_30/records?filters=[{"field":"field_291","operator":"is","value":"'.$loginMailId.'"}]';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output,true);
    }
}
