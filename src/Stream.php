<?php 
namespace OSW3\HttpClient;

use OSW3\HttpClient\Helper\HttpHelper;
use OSW3\HttpClient\Interfaces\StreamInterface;

class Stream
{
    private \CurlHandle|null $handler = null;
    private StreamInterface $stream;
    private array $options = array();

    public function __construct()
    {
        $this->stream = new StreamInterface;
    }

    public function open(): self
    {
        if ($this->handler instanceof \CurlHandle) return $this;
        
        $this->handler = curl_init();

        return $this;
    }

    public function prepare($name, mixed $value): self
    {
        switch ($name)
        {
            case 'cookie':
            case 'cookies':
                $value = HttpHelper::toCookieString($value);
                $this->options[$name] = [['key' => \CURLOPT_COOKIE, 'value' => $value]]; 
            break;

            case 'accept-encoding':
                $this->options[$name] = [['key' => \CURLOPT_ENCODING, 'value' => $value]]; 
            break;

            case 'url':
                $this->options[$name] = [['key' => \CURLOPT_URL, 'value' => $value]]; 
            break;

            case 'header':
                if (!empty($value))
                {
                    $this->options[$name] = [['key' => \CURLOPT_HTTPHEADER, 'value' => $value]]; 
                }
            break;
            
            case 'method': switch ($value) {
                case HttpHelper::METHOD_HEAD: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'HEAD'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => true]];
                break;

                case HttpHelper::METHOD_GET: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => true],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => null],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_POST: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => true],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => null],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_PUT: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'PUT'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_PATCH: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'PATCH'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_DELETE: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'DELETE'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_PURGE: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'PURGE'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_TRACE: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'TRACE'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_CONNECT: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'CONNECT'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;

                case HttpHelper::METHOD_OPTIONS: $this->options[$name] = [
                    ['key'  => \CURLOPT_HTTPGET,        'value' => false],
                    ['key'  => \CURLOPT_POST,           'value' => false],
                    ['key'  => \CURLOPT_CUSTOMREQUEST,  'value' => 'OPTIONS'],
                    ['key'  => \CURLOPT_RETURNTRANSFER, 'value' => true],
                    ['key'  => \CURLOPT_HEADER,         'value' => true],
                    ['key'  => \CURLOPT_NOBODY,         'value' => false]];
                break;
            } break;

            case 'parameters':
                if (!empty($value))
                {
                    $this->options[$name] = [['key' => \CURLOPT_POSTFIELDS, 'value' => $value]]; 
                }
            break;

            case 'proxy':
                $proxy = null;
                $type = null;

                if (is_array($value))
                {
                    if (isset($value['proxy'])) {
                        $proxy = $value['proxy'];
                    }
                    if (isset($value['type'])) {
                        $type = $value['type'];
                    }
                }

            
                if (is_string($value) && !empty(trim($value)))
                {
                    $proxy = trim($value);
                }

                $this->options['proxy'] = array();
                if ($proxy !== null) $this->options['proxy'][] = ['key' => \CURLOPT_PROXY, 'value' => $proxy]; 
                if ($type !== null)  $this->options['proxy'][] = ['key' => \CURLOPT_PROXYTYPE, 'value' => $type]; 

                if (empty($this->options['proxy']))
                {
                    unset($this->options['proxy']);
                }

            break;

            case 'referer':
                $this->options[$name] = [['key' => \CURLOPT_REFERER, 'value' => $value]]; 
            break;

            case 'timeout':
            case 'request-timeout':
                $this->options[$name] = [['key' => \CURLOPT_TIMEOUT, 'value' => $value]]; 
            break;
            case 'connection-timeout':
                $this->options[$name] = [['key' => \CURLOPT_CONNECTTIMEOUT, 'value' => $value]]; 
            break;

            case 'ua':
            case 'useragent':
            case 'user-agent':
                $this->options['user-agent'] = [['key' => \CURLOPT_USERAGENT, 'value' => $value]]; 
            break;
        }

        return $this;
    }

    public function execute(): StreamInterface
    {
        $execution_time_start = microtime(true);

        $this->open();

        foreach ($this->options as $options) foreach ($options as $option)
        {
            curl_setopt($this->handler, $option['key'], $option['value']);
        }

        $execution_time_end                 = microtime(true);
        $execution_time_total               = $execution_time_end - $execution_time_start;

        $option                             = $this->options;
        $exec                               = curl_exec($this->handler);
        $error                              = curl_error($this->handler);
        $process                            = curl_getinfo($this->handler);
        $process['execution_time_start']    = $execution_time_start;
        $process['execution_time_end']      = $execution_time_end;
        $process['execution_time_total']    = $execution_time_total;
        $process['is_header_transferred']   = $this->isHeaderTransferred();
        $process['is_content_transferred']  = $this->isContentTransferred();

        $this->stream->setContent($exec);
        $this->stream->setError($error);
        $this->stream->setProcess($process);
        $this->stream->setOptions($options);

        $this->close();

        return $this->stream;
    }

    public function result(): StreamInterface
    {
        return $this->stream;
    }

    public function close(): self
    {
        if (!$this->handler instanceof \CurlHandle) return $this;

        curl_close($this->handler);
        unset($this->handler);

        return $this;
    }


    private function isHeaderTransferred(): bool
    {
        return $this->getOption(\CURLOPT_HEADER, $this->options['method']);
    }

    private function isContentTransferred(): bool
    {
        return $this->getOption(\CURLOPT_NOBODY, $this->options['method'], true);
    }

    private function getOption($search, array $array, bool $not = false)
    {
        $key = array_search($search, array_column($array, 'key'));
        
        if (isset($array[$key]['value']))
        {
            return $not ? !$array[$key]['value'] : $array[$key]['value'];
        }

        return false;
    }
}