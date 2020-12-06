<?php
namespace Haa\framework;
use app\handlers;
use SessionManager;
require 'config.php';



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

    protected function init()
    {
      
    }

    public static function run()
    {
        $regs = new Registry();
        $regs->init();
        $regs->doConfiguration();
    }

    public function doConfiguration ()
    {
        global $root;
        global $app;
        global $framework;
        global $tpl;
        global $data;
        echo "hrllo";
        return $root;
        return $app;
        return $framework;
        return $tpl;
        return $data;
    }

}
    