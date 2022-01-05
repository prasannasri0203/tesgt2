<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Log;

class CronjobController extends Controller
{
    
    public function fetchApplicantData() {
        
        $url ='https://api.knack.com/v1/objects/object_2/records?filters='.urlencode('[{"field":"field_245","operator":"is not","value":"Collaboration Request (Multi-Masjid Support)"}]');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $responseRecord = json_decode($server_output,true);
        $records=$responseRecord['records'];
        // dd($records);
        foreach ($records as $datas) {
            // if ($datas['field_245'] != '' && $datas['field_10'] !='') {
            if($datas !=''){
                //filter the particular majid detail.
                $majidDetail = $this->getMajId($datas['field_141_raw'][0]['identifier']);
                //from mailid
                $fromMailId = '';
                if(isset($majidDetail['records'][0]['field_220_raw']['email']) && $majidDetail['records'][0]['field_220_raw']['email']!='') {
                    $fromMailId = $majidDetail['records'][0]['field_220_raw']['email']; 
                }
                //usename
                $mailName = strstr($fromMailId,'@',true);
                //to mailid
                $toEmail = strip_tags($datas['field_10']);

                //cc mailid
                // $ccEMail = 'prasanna.srinivasan@colanoline.com';
                $ccEMail = ['mubarakali.akbar@colanonline.com','support@zakah-network.com'];
                //mail functionality
                if ($fromMailId !='' && $toEmail !='' && (isset($datas['field_308']) && $datas['field_308'] == "No" )) {

                    \Mail::send('status_user',['datas' => $datas], function($message) use ($mailName,$fromMailId,$toEmail,$ccEMail) {
                        $message->from($fromMailId,$mailName);
                        $message->to($toEmail)->cc($ccEMail);
                        $message->subject('Zakah Application Status');
                    });
                    
                    if (Mail::failures()) {
                        
                        Log::info("Something went to wrong so that ".$datas['field_10_raw']['email']." is not send mail..."); 
                    
                    } else {
                        
                        $url = "https://api.knack.com/v1/objects/object_2/records/".$datas['id'];
                    
                        $jsonData = '{"field_308":"true"}';
                        
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
                }
            }
        }
    }
    
    public function getMajId($majidName) {

        $url = 'https://api.knack.com/v1/objects/object_1/records?filters='.urlencode('[{"field":"field_128","operator":"is","value":"'.$majidName.'"}]');
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return json_decode($server_output,true);
    }

    public function deleteRegistration(){

        $url ='https://api.knack.com/v1/objects/object_30/records?filters='.urlencode('[{"field":"field_293","operator":"is","value":"pending approval"}]');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $responseRecord = json_decode($server_output,true);
        $records=$responseRecord['records'];
        
        foreach ($records as $datas){
            if ($datas != ''){
                //All user
                $url = 'https://api.knack.com/v1/objects/object_3/records?filters='.urlencode('[{"field":"field_20","operator":"is","value":"'.$datas['field_291_raw']['email'].'"}]');

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
                $getData = json_decode($server_output,true);
                
                if (!empty($getData['records'])) {
                    $id = $getData['records'][0]['id'];
                }
                    
                if (isset($id) && $id !='') {

                    $url ='https://api.knack.com/v1/objects/object_3/records/delete';
                
                    $jsonData = '{"ids": "'.$id.'"}';
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
                    // Receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $server_output = curl_exec($ch);
                    curl_close ($ch);
                    $response = json_decode($server_output,true);
                    if($response){
                        $url ='https://api.knack.com/v1/objects/object_30/records/'.$datas['id'];
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_POSTFIELDS,'');
                        // Receive server response ...
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $server_output = curl_exec($ch);
                        curl_close ($ch);
                        json_decode($server_output,true);
                    }
                }
            }   
        }
    }

    public function webhookResponse(){

        // webhook.php
        //
        // Use this sample code to handle webhook events in your integration.
        //
        // 1) Paste this code into a new file (webhook.php)
        //
        // 2) Install dependencies
        //   composer require stripe/stripe-php
        //
        // 3) Run the server on http://localhost:4242
        //   php -S localhost:4242

        require 'vendor/autoload.php';

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'sk_test_Fl47TIOHWr8jSDdBbVRtp3dj00hCrmxtjy';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
          $event = \Stripe\webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
          );
        } catch(\UnexpectedValueException $e) {
          // Invalid payload
          http_response_code(400);
          exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
          // Invalid signature
          http_response_code(400);
          exit();
        }
        // Handle the event
        switch ($event->type) {
          case 'charge.failed':
            $charge = $event->data->object;
            print_r("failed");
            print_r($charge);
          case 'charge.succeeded':
            $charge = $event->data->object;
            print_r("succeeded");
            print_r($charge);
          // ... handle other event types
          default:
            echo 'Received unknown event type ' . $event->type;
            print_r("unknown");
            print_r($charge);
        }

        http_response_code(200);
    }
}