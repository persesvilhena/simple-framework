<?php
namespace Simple\Core;

class Modules{

    private $Module;
    private $Controller;

    public function __construct(Mapper $mapper){
        $this->Module = $mapper->Module;
        $this->Controller = $mapper->Controller;
    }


    public function load(){

        if(file_exists (__ROOT__.'Modules/'.$this->Module.'/Controller/'.$this->Controller.'.php')){
            $file = __ROOT__.'Modules/'.$this->Module.'/Controller/'.$this->Controller.'.php';
            $this->loadModels();
            require_once ($file);
            $fp = fopen($file, 'r');
            $class = $namespace = $buffer = '';
            $i = 0;
            while (!$class) {
                if (feof($fp)) break;

                $buffer .= fread($fp, 512);
                $tokens = token_get_all($buffer);

                if (strpos($buffer, '{') === false) continue;

                for (;$i<count($tokens);$i++) {
                    if ($tokens[$i][0] === T_NAMESPACE) {
                        for ($j=$i+1;$j<count($tokens); $j++) {
                            if ($tokens[$j][0] === T_STRING) {
                                $namespace .= '\\'.$tokens[$j][1];
                            } else if ($tokens[$j] === '{' || $tokens[$j] === ';') {
                                break;
                            }
                        }
                    }

                    if ($tokens[$i][0] === T_CLASS) {
                        for ($j=$i+1;$j<count($tokens);$j++) {
                            if ($tokens[$j] === '{') {
                                $class = $tokens[$i+2][1];
                            }
                        }
                    }
                }
            }
            $return = $namespace . '\\' . $class;
        }else{
            $return = '\Simple\Errors\Error404';
        }

        return $return;
    }

    public function loadModels(){
        $dir = __ROOT__.'Modules/'.$this->Module.'/Model';
        $files = scandir($dir);
        foreach($files as $n){
            if(substr($n, -3) == "php"){
                require_once(__ROOT__.'Modules/'.$this->Module.'/Model/'.$n);
            }
        }
    }
}