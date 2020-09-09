<?php
namespace Simple\Http;

class Url{
    public $url;
    public $BaseUrl;

    public function __construct(){
        $this->ReadUri()->TranslateRoutes()->ExplodeUrl()->RemoveEmpty();
        $this->LoadBaseUrl();
    }


    private function ReadUri(){
        if(isset($_SERVER["REQUEST_URI"])){
            $this->url = $_SERVER["REQUEST_URI"];
            if($this->url[-1] != "/"){
                $this->url = $this->url . "/";
            }
        }else{
            $this->url = "home/home/index/";
        }
        return $this;
    }

    private function TranslateRoutes(){
        $config = new \Simple\Config;
        foreach($config->Routes() as $route => $newRoute){
            $this->url = str_replace($route, $newRoute, $this->url);
        }
        return $this;
    }

    private function ExplodeUrl(){
        $this->url = explode('/', $this->url);
        return $this;
    }

    private function RemoveEmpty(){
        if(is_array($this->url)){
            foreach ($this->url as $i => $n){
                if(empty($n)){
                    unset($this->url[$i]);
                }
            }
        }
        return $this;
    }

    private function LoadBaseUrl(){
        $this->BaseUrl = $_SERVER['SERVER_NAME'] . '/';
    }

}
?>