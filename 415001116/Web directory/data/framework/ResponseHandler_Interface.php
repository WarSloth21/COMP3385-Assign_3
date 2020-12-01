<?php
namespace Haa\framework;
interface ResponseHandler_Interface
{
    /**
     * Returns response header
     */
    public function giveHeader() : ResponseHeader;


    /**
     * Returns the response state
     */
     public function giveState() : ResponseState;


     /**
      * Return the Response Logger
      */
      public function giveLogger() : ResponseLogger;


}