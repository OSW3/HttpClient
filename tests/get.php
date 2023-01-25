<?php
/// ======================================================================== ///
/// Test : Client Http                                                       ///
/// ------------------------------------------------------------------------ ///
/// Open terminal                                                            ///
/// > php get.php                                                            ///
/// ======================================================================== ///

print_r("--- ========================================================== ---\n");
print_r("--- TEST : CLIENT HTTP                                         ---\n");
print_r("--- Method : GET                                               ---\n");
print_r("--- Date : ".date('Y-m-d H:i:s')."                                 ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n");





/// 1. Requirements
/// ======================================================================== ///

require "../vendor/autoload.php";

use OSW3\HttpClient\Client;

$header = array();
$stream = array();
$url = "https://jsonplaceholder.typicode.com/posts";




/// 2. Set options for the Request Header
/// ======================================================================== ///

///* Passing the Referer
///* ---
// $header['referer'] = "------> HERE IS THE REFERER OPTION";

///* Passing the User Agent
///* ---
// $header['user-agent'] = "------> HERE IS THE USER-AGENT";

///* Passing the Cookie
///* ---
// $header['cookie'] = "cookie_1=Cookie 1 from Header";
// $header['cookie'] = array(
//     'cookie_1' => "Cookie 1 from Header",
//     'cookie_2' => "Cookie 2 from Header",
// );

///* Passing Bearer
///* ---
// $header['bearer'] = "------> HERE IS THE BEARER TOKEN";

///* Passing API-KEY
///* ---
// $header['api-key'] = array(
//     'name' => "API-NAME",
//     'key' => "API-KEY",
// );

///* Passing Basic Authentication
///* ---
// $header['basic-auth'] = array(
//     'username' => "Auth-Username",
//     'password' => "Auth-Password-123456",
// );


///* Passing Basic Authorization
///* ---
// $header['authorization'] = "the-authorization-string";


///* Passing Accept Encoding
///* ---
// $header['accept-encoding'] = "gzip-from-header";


///* Passing Content Type
///* ---
// $header['content-type'] = "application/json";
// $header['content-length'] = strlen($content);
// $header['content-charset'] = "utf-8";

///* Expect
///* ---
// $header['expect'] = "100-continue";




/// 3. Set options for the Stream Engine
/// ======================================================================== ///

///* Passing the Referer
///* ---
// $stream['referer'] = "https://referer-from-stream-options.exemple.com";


///* Passing the User Agent
///* ---
// $stream['user-agent'] = "User agent from the Stream Option";


///* Passing the Cookie
///* ---
// $stream['cookie'] = "cookie_1=Cookie 1 from Stream Options";
// $stream['cookie'] = array(
//     'cookie_1' => "Cookie 1 from Stream Options",
//     'cookie_2' => "Cookie 2 from Stream Options",
// );


///* Passing Accept Encoding
///* ---
// $stream['accept-encoding'] = "gzip-from-stream-option";


///* Request Timeout
///* ---
// $stream['request-timeout'] = 30;
// $stream['connection-timeout'] = 30;

///* Proxy
///* ---
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



/// 4. Execute the query
/// ======================================================================== ///

$client = new Client;
$response = $client->get($url, $header, $stream);


print_r("--- ========================================================== ---\n");
print_r("--- ------------------- Response options --------------------- ---\n");
print_r("\n\n");
print_r($response->options());
print_r("\n\n");
print_r("--- --------------- End of Response options ------------------ ---\n");
print_r("--- ========================================================== ---\n");

print_r("\n\n\n\n\n\n");

print_r("--- ========================================================== ---\n");
print_r("--- --------------------- Request Process -------------------- ---\n");
print_r("\n\n");
print_r($response->process());
// print_r($response->process('url'));
print_r("\n\n");
print_r("--- ----------------- End of Request Process ----------------- ---\n");
print_r("--- ========================================================== ---\n");

print_r("\n\n\n\n\n\n");

print_r("--- ========================================================== ---\n");
print_r("--- --------------------- Response error --------------------- ---\n");
print_r("\n\n");
print_r($response->error());
print_r("\n\n");
print_r("--- ----------------- End of Response error ------------------ ---\n");
print_r("--- ========================================================== ---\n");

print_r("\n\n\n\n\n\n");

print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Response Header --------------------- ---\n");
print_r("\n\n");
print_r($response->header());
// print_r($response->headerRaw());
// print_r($response->headerLines());
// print_r('version : ');          print_r($response->header('version'));          print_r("\n");
// print_r('Status-code : ');      print_r($response->header('status-code'));      print_r("\n");
// print_r('Status-message : ');   print_r($response->header('status-message'));   print_r("\n");
// print_r('Host : ');             print_r($response->header('host'));             print_r("\n");
// print_r('Date : ');             print_r($response->header('date'));             print_r("\n");
// print_r('Connection : ');       print_r($response->header('connection'));       print_r("\n");
// print_r('X-powered-by : ');     print_r($response->header('x-powered-by'));     print_r("\n");
// print_r('Content-type : ');     print_r($response->header('content-type'));     print_r("\n");
print_r("\n\n");
print_r("--- ----------------- End of Response Header ----------------- ---\n");
print_r("--- ========================================================== ---\n");

print_r("\n\n\n\n\n\n");

print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Response Content -------------------- ---\n");
print_r("\n\n");
print_r("URL : " . $url . "\n");
print_r("\n\n");
print_r("--- ---------------------------------------------------------- ---\n");
print_r("\n\n");
print_r($response->content());
print_r("\n\n");
print_r("--- ---------------------------------------------------------- ---\n");
print_r("\n\n");
print_r("URL : " . $url . "\n");
print_r("\n\n");
print_r("--- ---------------- End of Response Content ----------------- ---\n");
print_r("--- ========================================================== ---\n");

print_r("\n\n\n\n\n\n");
