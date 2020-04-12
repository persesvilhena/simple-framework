<?php
class Config{

    public function Modules(){
        return [
            'Home',
        ];
    }

    public function BaseUrl(){
        return "http://localhost/perses-framework/Public/";
    }

    public function Routes(){
        return [
            'about/' => 'home/home/about/',
        ];
    }
}
?>