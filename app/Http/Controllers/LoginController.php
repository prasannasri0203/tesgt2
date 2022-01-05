<?php
/********************************************************************************
* @class                    LoginController.
* @Description              It consist login and logout functionality.
* @author                   prasanna
* @created date             mar 2021
*********************************************************************************/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Validator;
use response;
use DB;

class LoginController extends Controller
{
    
    public function login(Request $request) {
        
        if ($request->session()->has('apiId')) {
            return Redirect::back();
        } else {
            return view('login');
        }
    }

    public function forgetPassword(){

        return view('forget_password');
    }

    public function changePassword(Request $request){

        $url = "https://api.knack.com/v1/accounts/users/password";
        
        $jsonData = '{"email":"'.$request->email.'"}'; 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
       
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
     
        curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close ($ch);
    
        $responseRecord = json_decode($server_output, true);    

    }

    //login
    public function doLogin(Request $request) {
        
        $request->validate([
                            'email'=>'required|email',
                            'password'=>'required'
        ],
        [
            'email.required'=> 'Email is Required',
            'password.required'=> 'Password is Required'
        ]);
        
        $url = 'https://api.knack.com/v1/objects/object_30/records?filters=[{"field":"field_291","operator":"is","value":"'.$request->email.'"}]';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $responseData = json_decode($server_output,true);
        
        if ($responseData['total_records'] == 0 && empty($responseData['record'])) {
            
            Session::flash('failedMessage','This '.$request->email.' does not have Account, Kindly Register your Account');
            return Redirect('/registration');
            
        } else {
            
            $url = "https://api.knack.com/v1/applications/59c99d5c6b83d222c7507c61/session";
        
            $jsonData = '{"email":"'.$request->email.'","password":"'.$request->password.'"}'; 
    
            $response = $this->curl($url,$jsonData,'login');
            
            $responseData=json_decode($response,true);
    
            if (isset($responseData['errors'][0]['message'])) {
                
                Session::flash('message',$responseData['errors'][0]['message']);
                return Redirect::back();
                
            } else if (isset($responseData['session']['user']['id']) && isset($responseData['session']['user']['token'])) {
                
                Session::put('apiId',$responseData['session']['user']['id']);
                Session::put('loginMailId',$request->email);
                return redirect('/dashboard');
            }
        }
    }
    
    public function privacyPolicy(){
        
        return view("privacy_policy");
    }

    //logout
    public function logout() {
        
        session::flush();
        return redirect('/');
    }
}
