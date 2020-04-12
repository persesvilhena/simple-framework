<?php
class Principal extends Model{
    public function soma($a, $b){
        return $a + $b;
    }
}
class Teste extends Model{
    public function teste(){
        return "teste";
    }
}
?>