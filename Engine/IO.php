<?php
class Input{
    
    public function Post($par = null){
        if($par == null){
            return $_POST;
        }else{
            return $_POST[$par];
        }
    }

}