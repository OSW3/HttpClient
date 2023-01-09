<?php 
namespace OSW3\Http;

use OSW3\Http\HttpHelper;
use OSW3\Http\HttpRequest;
use OSW3\Http\HttpResponse;

class HttpClient
{
    public function head(string $uri, array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_HEAD, $header, array(), $options);
        return new HttpResponse($request->result());
    }

    public function get(string $uri, array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_GET, $header, array(), $options);
        return new HttpResponse($request->result());
    }

    public function post(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_POST, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }

    public function put(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_PUT, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }

    public function patch(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_PATCH, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }
    
    public function delete(string $uri, array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_DELETE, $header, array(), $options);
        return new HttpResponse($request->result());
    }
    
    public function options(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_OPTIONS, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }

    public function purge(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_PURGE, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }

    public function trace(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_TRACE, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }

    public function connect(string $uri, array $parameters = array(), array $header = array(), array $options = array()): HttpResponse
    {
        $request = new HttpRequest($uri, HttpHelper::METHOD_CONNECT, $header, $parameters, $options);
        return new HttpResponse($request->result());
    }
}