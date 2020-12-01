<?php

class Route
{
    private static $routes = Array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function pathNotFound($function)
    {
        self::$pathNotFound = $function;
    }

    
}