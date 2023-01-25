<?php
/// ======================================================================== ///
/// Test : Client Http                                                       ///
/// ------------------------------------------------------------------------ ///
/// Open terminal                                                            ///
/// > php head.php                                                            ///
/// ======================================================================== ///

print_r("--- ========================================================== ---\n");
print_r("--- TEST : CLIENT HTTP                                         ---\n");
print_r("--- Method : HEAD                                              ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n");



/// 1. Requirements
/// ======================================================================== ///

require "../vendor/autoload.php";
use OSW3\HttpClient\Client;



/// 2. HTTP Client Instance
/// ======================================================================== ///

$client = new Client;
$header = array();
$stream = array();
$url = "https://jsonplaceholder.typicode.com/posts";
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


/// 5. Execute the query
/// ======================================================================== ///

$response = $client->head($url, $header, $stream);

// print_r("-- RESPONSE : OPTIONS --");
// print_r($response->options());
// print_r("\n\n");

// print_r("-- RESPONSE : PROCESS --");
// print_r($response->process());
// print_r("\n\n");
// print_r($response->process('url'));
// print_r("\n\n");

// print_r("-- RESPONSE : ERROR --");
// print_r($response->error());
// print_r("\n\n");

// print_r("-- RESPONSE : HEADER --");
// print_r("\n\n");
// print_r($response->headerRaw());
// print_r($response->headerLines());
print_r($response->header());
print_r("\n\n");
// print_r($response->header('version'));
// print_r($response->header('status-code'));
// print_r($response->header('versione'));
// print_r("\n\n");

print_r("-- RESPONSE : CONTENT --");
print_r($response->content());
print_r("\n\n");