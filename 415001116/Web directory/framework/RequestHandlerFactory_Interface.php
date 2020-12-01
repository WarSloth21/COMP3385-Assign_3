<?php

namespace Haa\framework;

interface RequestHandlerFactory_Interface
{
    Public static function makeRequestHandler(string $request='default') : PageController_Command_Abstract;
}