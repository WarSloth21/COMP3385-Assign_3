<?php
namespace Haa\framework;

class CommandContext
{
    private $params = [];
    private $error = "";

    public function add(string $key, $val)
    {
        
    }
    
    public function get(string $key)
    {
        if (isset($this->params[$key]))
        {
            return $this->params[$key];
        }
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError () :array
    {
        return $this->error;
    }
}