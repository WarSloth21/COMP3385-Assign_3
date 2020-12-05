<?php
namespace Haa\framework;
use SessionManager;
use Config;



abstract class Registry
{
    private $config = null;
    private $session;

    public function getSession(): SessionManager
    {
        if (is_null($this->session))
        {
            $session = new SessionManager();
            $this->session = $session->create();
        }
        return $this->session;
    }


    public function doConfiguration (): Config
    {
        if(is_null($this->config))
        {
            $this->config = new Config();
        }
        return $this->config;
    }

}
    