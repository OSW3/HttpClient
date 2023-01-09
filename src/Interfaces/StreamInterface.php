<?php 
namespace OSW3\HttpClient\Interfaces;

final class StreamInterface
{
    private array $options;
    private array $process;
    private string $error;
    private string $content;

    /**
     * Get the value of options
     */ 
    public function options(): array
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */ 
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the value of process
     */ 
    public function process(): array
    {
        return $this->process;
    }

    /**
     * Set the value of process
     *
     * @return  self
     */ 
    public function setProcess(array $process): self
    {
        $this->process = $process;

        return $this;
    }

    /**
     * Get the value of error
     */ 
    public function error(): string
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @return  self
     */ 
    public function setError(string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function content(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}