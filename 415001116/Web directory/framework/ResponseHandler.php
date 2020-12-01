<?php
namespace Haa\framework;
class ResponseHandler implements ResponseHandler_Interface
{
    //protected $body = [];
    protected $header = null;
    protected $state = null;
    protected $logger = null;
    private static $unInstance;

    public function __construct(ResponseHeader $header, ResponseState $state, ResponseLogger $logger)
    {
        $this->header = $header;
        $this->state = $state;
        $this->logger = $logger;
       // $this->body['header'] = $head;
        //$this->body['state'] = $state;
        //$this->body['log'] = $log;
    }

    public static function Instance(ResponseHeader $header, ResponseState $state, ResponseLogger $logger)
    {
        if (empty(self::$unInstance))
        {
            self::$unInstance = new ResponseHandler($header, $state, $logger);
        }
    }

    public static function getInstance()
    {
        if (!empty(self::$unInstance))
        {
            return self::$unInstance;
        }
    }


    public function giveHeader(): ResponseHeader
    {
        return clone $this->header;
    }

    public function giveState(): ResponseState
    {
        return clone $this->state;
    }

    public function giveLogger(): ResponseLogger
    {
        return clone $this->logger;
    }
}