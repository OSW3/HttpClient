<?php 
namespace OSW3\HttpClient;

use OSW3\HttpClient\Exception;
use OSW3\HttpClient\Interfaces\StreamInterface;


class Response
{
    private StreamInterface $stream;

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    public function content(): ?string
    {
        $content    = $this->stream->content();
        $headerSize = $this->process('header_size');
        $hasHeader  = $this->process('is_header_transferred');
        $hasContent = $this->process('is_content_transferred');
        
        if (!$hasHeader)
        {
            $headerSize = 0;
        }

        if (!$hasContent)
        {
            return null;
        }

        return substr($content, $headerSize);
    }

    /**
     * Header as Text
     *
     * @return string|null
     */
    public function headerRaw(): ?string
    {
        $content    = $this->stream->content();
        $size       = $this->process('header_size');
        $hasHeader  = $this->process('is_header_transferred');

        if (!$hasHeader) return null;

        $header  = substr($content, 0, $size);
        $header  = trim($header);

        return $header;
    }

    /**
     * Header as Numerical Array
     *
     * @return array
     */
    public function headerLines(): array
    {
        if (!$header = $this->headerRaw()) 
        {
            return array();
        }

        return explode("\n", $header);
    }

    /**
     * Header as associative array
     *
     * @return string|array|null
     */
    public function header(): string|array|null
    {
        $arguments  = func_get_args();

        if (($header = $this->headerLines()) && empty($header))
        {
            return array();
        }

        $header = $this->assocHeader($header);

        if (empty($arguments))
        {
            return $header;
        }

        $key = $arguments[0];

        if (isset($header[$key]))
        {
            return $header[$key];
        }

        return null;
    }

    public function assocHeader(array $header = array())
    {
        $arr = array();

        $re = "/^(HTTP\/\d+(?:\.\d+)?)\s(\d{3})\s(.+).*/i";
        preg_match($re, $header[0], $matches);

        $arr['version'] = isset($matches[1]) ? $matches[1] : null;
        $arr['status-code'] = isset($matches[2]) ? $matches[2] : null;
        $arr['status-message'] = isset($matches[3]) ? $matches[3] : null;
        unset($header[0]);

        foreach ($header as $line)
        {
            // Sanitize $line
            $line = trim($line);
            if (empty($line)) continue;
        
            // Parse $line
            $exp = explode(": ", $line);
        
            // if (count($exp) === 2)
            // {
                $key = $exp[0];
                $value = $exp[1];
            // }

            $key = strtolower($key);
            $arr[$key] = $value;
        }

        return $arr;
    }

    public function process()
    {
        $arguments = func_get_args();
        $process = $this->stream->process();

        if (empty($arguments))
        {
            return $process;
        }

        $key = $arguments[0];

        if (isset($process[$key]))
        {
            return $process[$key];
        }

        throw new Exception("The key \"$key\" was not found in the Response Process List");
    }

    public function error(): string
    {
        return $this->stream->error();
    }

    public function options(): array
    {
        return $this->stream->options();
    }
}