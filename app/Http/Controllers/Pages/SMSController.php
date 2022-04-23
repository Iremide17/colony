<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function sendSMS($message, $to)
    {
        $body =[
            'query' =>
            [
                'username' => 'sandbox',
                'to' => $to,
                'from' => application('name').'',
                'message' => $message,
                'Apikey' => env('SMS_API_KEY')
            ]
        ];
        
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.sandbox.africastalking.com/']);

        $request = $client->request("GET", "restless/send", $body, [
            "headers" => [
            "Accept" => "application/json",
            "Content-type" => "application/json"
            ]]);

        //$response = $request->getBody();

        return $request->getStatusCode();
    }
}
