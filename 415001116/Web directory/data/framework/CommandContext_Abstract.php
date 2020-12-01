<?php
namespace Haa\framework;

abstract class CommandContext_Abstract
{
    /**
     * Stores data for the Context
     */
    protected $data = [];

    /**
     * Stores all Error Messages
     */
    protected $errors = [];


    public function __construct()
    {
        $this->data['post'] = $_POST;
        $this->data['get'] = $_GET;
        $this->data['params'] = [];
    }

    /**
     * Adds a new variable to the context in the parm subarray
     */
    abstract public function add(string $key, $val);

    /**
     * Retrieves a stored Variable
     */
    abstract public function get(string $key);


    abstract protected function setError($error);

    /**
     * Retrives all Error Messages
     */
    abstract public function getErrors() : array;
}