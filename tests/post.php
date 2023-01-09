<?php 

use OSW3\Http\HttpClient;

require "../vendor/autoload.php";

$url = require "./url.php";

// 1. HTTP Client Instance
// --

$client = new HttpClient;


// 2. Change the Request Header
// --

$header = array(
    // 'referer' => "http://WWW.REFERERErrrr.com",
    // "user-agent" =>  "TEST UA", // default
    // "cookie" => array(
    //     'cookie_name' => "cookie_vale",
    //     'cookie_2' => "cookie_val2"
    // ),
    // "cookie" => "cookie_name=cookie_vale",

    // $header['Authorization'] = "Bearer xxxxx";
    // Accept-Encoding
    // Content-Type
    // 'charset' => "UTF-8",
    // "Content-Type" =>  "application/dfdfdfdfdf", // default
    // Content-Length
    // "Expect" => "null",
    
    
    // -- Requete post
    // Content-Length: strlen()
    // Content-Type: json


    // CURLOPT_HTTP_VERSION
    // CURLOPT_ENCODING
    // CURLOPT_TIMEOUT
    // CURLOPT_CONNECTTIMEOUT
    // CURLOPT_SSL_VERIFYPEER
    // CURLOPT_PROXYTYPE
    // CURLOPT_PROXY
    // \CURLOPT_TIMEOUT
    // \CURLOPT_CONNECTTIMEOUT
    // \CURLOPT_FOLLOWLOCATION
    // \CURLOPT_MAXREDIRS
);


// 3. Override the Stream settings
// --

$streamSettings = array(
    // "cookie" => "cookie_name=cookie_vale",
);


// 4. Set the request parameters
// --

$parameters = array(
    'param1' => "value 1",
    'param2' => "value 2",
);

// $client->head($url, $header);
$client->post($url, $parameters, $header, $streamSettings);