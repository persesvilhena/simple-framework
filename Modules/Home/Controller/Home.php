<?php
namespace App;

use \Simple\Mvc\Controller;


class Home extends Controller
{
    private $principal;

    public function __construct()
    {
        parent::__construct();
        $this->principal = new Principal();
    }

    public function Index()
    {
        return $this->response->setStatusCode(401)->setContent('Home')();
    }
}
?>