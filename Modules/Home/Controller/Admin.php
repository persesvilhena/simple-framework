<?php
namespace App;

use \Simple\Mvc\Controller;
use \Simple\Http\Response;
use \Simple\Mvc\View;


class Admin extends Controller{
    private $principal;
    public function __construct(){
        parent::__construct();
        $this->principal = new Principal();
    }
    public function Index(){
        $result = $this->principal->insert_example();
        //var_dump($result);
        echo "<hr>";
        $result = $this->principal->query_example();
        foreach($result as $row) {
            echo "<pre>";
            var_dump($row);
            echo "</pre>";
        }

        return $this->response->setStatusCode(200)->setContent('')();
    }


}
?>