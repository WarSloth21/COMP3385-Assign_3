<?php

namespace Haa\framework;

trait Insert_Trait
{
    /**
     * Takes data as value pais in array where the name is the 
     * associative array index e.g data['foo'] = 'bar'
     */
    abstract public function insert(array $values);
}