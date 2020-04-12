<?php
class Home extends Controller{
    private $principal;
    private $teste;
    public function __construct(){
        parent::__construct();
        $this->principal = new Principal;
        $this->teste - new Teste;
    }
    public function Index(){
        return new View();
    }

    public function About($par){
        $par = $par ." soma: ". $this->principal->soma(1,2) . $this->teste->teste();
        return new View('About', $par);
    }
}
?>