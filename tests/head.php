<?php 

use OSW3\Http\HttpClient;

require "../vendor/autoload.php";


// 1. HTTP Client Instance
// --

$client = new HttpClient;
$header = array();
$stream = array();
$url    = require "./url.php";


// 2. Change the Request Header
// --

/// Passing the Referer
// $header['referer'] = "https://referer-from-header.exemple.com";


/// Passing the User Agent
// $header['user-agent'] = "User agent from the header";


/// Passing the Cookie
// $header['cookie'] = "cookie_1=Cookie 1 from Header";
// $header['cookie'] = array(
//     'cookie_1' => "Cookie 1 from Header",
//     'cookie_2' => "Cookie 2 from Header",
// );


/// Passing Bearer
// $header['bearer'] = "the-bearer-string";

/// Passing API-KEY
// $header['api-key'] = array(
//     'name' => "API-NAME",
//     'key' => "API-KEY",
// );

/// Passing Basic Authentication
// $header['basic-auth'] = array(
//     'username' => "Auth-Username",
//     'password' => "Auth-Password-123456",
// );


/// Passing Basic Authorization
// $header['authorization'] = "the-authorization-string";


/// Passing Accept Encoding
// $header['accept-encoding'] = "gzip-from-header";


/// Passing Content Type
// $header['content-type'] = "application/json";
// $header['content-length'] = strlen($content);
// $header['content-charset'] = "utf-8";

// $header['expect'] = "100-continue";



// 3. Override the Stream settings
// --

/// Passing the Referer
// $stream['referer'] = "https://referer-from-stream-options.exemple.com";


/// Passing the User Agent
// $stream['user-agent'] = "User agent from the Stream Option";


/// Passing the Cookie
// $stream['cookie'] = "cookie_1=Cookie 1 from Stream Options";
// $stream['cookie'] = array(
//     'cookie_1' => "Cookie 1 from Stream Options",
//     'cookie_2' => "Cookie 2 from Stream Options",
// );


/// Passing Accept Encoding
// $stream['accept-encoding'] = "gzip-from-stream-option";


/// Request Timeout
// $stream['request-timeout'] = 30;
// $stream['connection-timeout'] = 30;

/// Proxy
// $stream['proxy'] = "http://192.168.0.1:80";
// $stream['proxy'] = array(
//     'proxy' => "http://192.168.0.1:80",
//     // 'type' => CURLPROXY_HTTP,
//     // 'type' => CURLPROXY_HTTPS,
//     // 'type' => CURLPROXY_HTTP_1_0,
//     // 'type' => CURLPROXY_SOCKS4,
//     // 'type' => CURLPROXY_SOCKS4A,
//     // 'type' => CURLPROXY_SOCKS5,
//     // 'type' => CURLPROXY_SOCKS5_HOSTNAME,
// );


    // CURLOPT_HTTP_VERSION
    // CURLOPT_SSL_VERIFYPEER
    // \CURLOPT_FOLLOWLOCATION
    // \CURLOPT_MAXREDIRS

// $client->head($url, $header);
$client->head($url, $header, $stream);