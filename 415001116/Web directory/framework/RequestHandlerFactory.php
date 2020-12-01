<?php

namespace Haa\framework;



class RequestHandlerFactory implements RequestHandlerFactory_Interface
{
    public static function makeRequestHandler(string $action = 'Default'): PageController_Command_Abstract
    {
        if (preg_match('/\W/', $action)) 
        {
            throw new \Exception("illegal characters in request");
        }

        $class = "app\\handlers\\" . UCFirst(strtolower($action)) . "Controller";


        if (!class_exists($class))
        {
            throw new \Exception("No request handler class '$class' located");
        }

        $cmd = new $class();    // receiver goes here
        return $cmd;
    }
}

?>