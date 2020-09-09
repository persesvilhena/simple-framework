<?php
namespace Simple;

class Config{

    public function Modules(){
        return [
            'Home',
        ];
    }

    public function Routes(){
        return [
            'about/' => 'home/home/about/',
        ];
    }
}
?>