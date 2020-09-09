<?php
namespace Simple\Core;

use \Simple\Http\Url;

class Mapper
{
    public $Module;
    public $Controller;
    public $Method;
    public $Parameters;

    public function __construct()
    {
        $url = new Url();
        $urlReturn = $url->url;

        if (!isset($urlReturn[1])){
            $urlReturn[1] = 'Home';
        }
        if (!isset($urlReturn[2])){
            $urlReturn[2] = 'Home';
        }
        if (!isset($urlReturn[3])){
            $urlReturn[3] = 'Index';
        }

        $this->Module = $urlReturn[1];
        $this->Controller = $urlReturn[2];
        $this->Method = $urlReturn[3];
        $this->Parameters = array_slice($urlReturn, 3);
    }
}