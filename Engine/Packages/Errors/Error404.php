<?php
namespace Simple\Errors;

class Error404 {
    public $response;
    public function __construct()
    {
        $this->response = new \Simple\Http\Response();
    }

    public function __call($name, $arguments)
    {
        return $this->response->setContent("Error 404 - Não foi possível encontrar a rota: '$name'  ")->setStatusCode(404)();
    }

}