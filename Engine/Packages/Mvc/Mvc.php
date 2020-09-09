<?php
namespace Simple\Mvc;


class Mvc{
    public $url;
    public $BaseUrl;

    public function __construct(){
        $url = new \Simple\Http\Url();
        $this->url = $url->url;
        $this->BaseUrl = $url->BaseUrl;
    }


}


?>