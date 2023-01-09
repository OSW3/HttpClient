<?php
/// ======================================================================== ///
/// Test : Client Http                                                       ///
/// ------------------------------------------------------------------------ ///
/// Open terminal                                                            ///
/// > php patch.php                                                           ///
/// ======================================================================== ///

print_r("--- ========================================================== ---\n");
print_r("--- TEST : CLIENT HTTP                                         ---\n");
print_r("--- Method : PATCH                                             ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n");



/// 1. Requirements
/// ======================================================================== ///

require "../vendor/autoload.php";
use OSW3\HttpClient\Client;



/// 2. HTTP Client Instance
/// ======================================================================== ///

$client = new Client;
$parameters = array();
$header = array();
$stream = array();
$url = "https://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol";
// $url    = require "./url.php";



/// 3. Change the Request Header
/// ======================================================================== ///

// $header['content-type'] = "application/json";
// $header['content-length'] = strlen($content);
// $header['content-charset'] = "utf-8";



/// 4. Override the Stream settings
/// ======================================================================== ///

// $stream['request-timeout'] = 30;
// $stream['connection-timeout'] = 30;



/// 5. Set the Request parameters
/// ======================================================================== ///

$parameters['param1'] = "value 1";
$parameters['param2'] = "value 2";



/// 6. Execute the query
/// ======================================================================== ///

$response = $client->patch($url, $parameters, $header, $stream);