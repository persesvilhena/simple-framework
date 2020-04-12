<?php
class Modules{
    private $url;

    public function __construct(){
        $url = new Url;
        $this->url = $url->Return();
        $this->load();
    }

    private function load()
    {
        if(file_exists (__ROOT__.'Modules/'.$this->url[0].'/Controller/'.$this->url[1].'.php')){
            require_once(__ROOT__.'Modules/'.$this->url[0].'/Controller/'.$this->url[1].'.php');
        }else{
            require_once(__ROOT__.'Modules/Errors/Index.php');
        }
        
    }
}