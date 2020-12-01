<?php
namespace Haa\framework;

interface Command_Interface
{
    public function execute(CommandContext $context) : bool;
}