<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function curl($url,$jsonData,$login) { 
                                                 
        // A very simple PHP example that sends a HTTP POST to a remote site
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        //curl_setopt($ch, CURLOPT_POST, 2);
        if ($login=="login") {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','X-Knack-Application-Id:59c99d5c6b83d222c7507c61', 'X-Knack-REST-API-KEY:5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e'));
        } 
        curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonData);
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, array());
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }
}
