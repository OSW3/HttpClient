<?php 
namespace OSW3\Http;

use OSW3\Http\HttpStream;

// * Prepare and check HTTP Header, and parameter

class HttpRequest
{
    private string|null $uri = null;
    private int|null $method = null;
    private array $parameters = array();
    private array $header = array();
    private HttpStream $stream;

    public function __construct(string $uri, int $method, array $header = array(), array $parameters = array(), array $streamOptions = array())
    {
        $this->setUri($uri);
        $this->setMethod($method);
        $this->setHeader($header);
        $this->setParameters($parameters);

        $this->stream = new HttpStream;

        // Override Stream Settings
        foreach ($streamOptions as $name => $value)
        {
            $this->stream->prepare($name, $value);
        }

        $this->stream->prepare('url', $this->getUri());
        $this->stream->prepare('method', $this->getMethod());
        $this->stream->prepare('header', $this->getHeader());
        $this->stream->prepare('parameters', $parameters);

        $this->stream->execute();
    }

    public function result(): StreamInterface
    {
        return $this->stream->result();
    }

    private function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }
    public function getUri(): ?string
    {
        return $this->uri;
    }

    private function setMethod(int $method): self
    {
        $this->method = $method;

        return $this;
    }
    public function getMethod(): ?int
    {
        return $this->method;
    }

    private function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;
        
        return $this;
    }
    public function getParameters(): array
    {
        return $this->parameters;
    }

    private function setHeader(array $header): self
    {
        $this->header = $header;
        
        return $this;
    }
    public function getHeader(): array
    {
        $header = array();

        foreach ($this->header as $key => $value)
        {
            switch ($key)
            {
                case 'authorization':
                    $header[] = "Authorization: ".$value;
                break;

                case 'basic-auth':
                    $username = $value['username'];
                    $password = $value['password'];
                    $auth_phrase = $username.":".$password;
                    $auth_phrase = base64_encode($auth_phrase);

                    $header[] = "Authorization: ".$auth_phrase;
                break;

                case 'api-key':
                    $header[] = $value['name'].": ".$value['key'];
                break;

                case 'bearer':
                    $header[] = "Authorization: Bearer ".$value;
                break;

                case 'cookie':
                case 'cookies':
                    $value = HttpHelper::toCookieString($value);
                    $header[] = "Cookie: ".$value;
                break;

                case 'ua':
                case 'useragent':
                case 'user-agent':
                    $header[] = "User-Agent: ".$value;
                break;

                default:
                    $header[] = $key.": ".$value;
            }

        }

        return $header;
    }
}