<?php 
namespace OSW3\HttpClient\Helper;

final class HttpHelper
{
    public const METHOD_HEAD    = 0;
    public const METHOD_GET     = 1;
    public const METHOD_POST    = 2;
    public const METHOD_PUT     = 3;
    public const METHOD_PATCH   = 4;
    public const METHOD_DELETE  = 5;
    public const METHOD_PURGE   = 6;
    public const METHOD_TRACE   = 7;
    public const METHOD_CONNECT = 8;
    public const METHOD_OPTIONS = 9;

    public static function toCookieString(mixed $data): string
    {
        $cookieString = "";

        if (is_array($data))
        {
            foreach ($data as $name => $value)
            {
                if (!empty($cookieString)) 
                {
                    $cookieString .= "; ";
                }

                $cookieString.= $name."=".$value;
            }
        }

        if (is_string($data))
        {
            $cookieString = $data;
        }

        return $cookieString;
    }
}