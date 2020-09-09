<?php
namespace Simple\Mvc;

class Controller extends Mvc
{
    public $response;
    public function __construct(){
        parent::__construct();

        $this->response = new \Simple\Http\Response();
    }


}