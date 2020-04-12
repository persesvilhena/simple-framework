<?php
class Url{
    private $url;

    public function Return(){
        if(isset($_GET['url'])){
            $this->url = $_GET['url'];
            if($this->url[-1] != "/"){
                $this->url = $this->url . "/";
            }
        }else{
            $this->url = "home/home/index/";
        }
        $config = new Config;
        foreach($config->Routes() as $route => $newRoute){
            $this->url = str_replace($route, $newRoute, $this->url);
        }
        
        $this->url = explode('/', $this->url);
        if(!isset($this->url[2])){
            $this->url[2] = "index";
        }
        
        return $this->url;
    }

    public function BaseUrl(){
        $config = new Config;
        return $config->BaseUrl();
    }
}
?>