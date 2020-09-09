<?php
namespace Simple\Mvc;

use Simple\Database\Database;

class Model extends Mvc
{
    protected $db;
    public function __construct(){
        parent::__construct();
        $this->db = new Database();
    }

}