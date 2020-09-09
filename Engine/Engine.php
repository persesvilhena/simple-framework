<?php
namespace Simple;

use \Simple\Core\Mapper;
use \Simple\Core\Modules;
use \Simple\Core\Factory;

class Engine{

    public static function run(){

        require_once(__ROOT__.'Engine/Config.php');
        require_once(__ROOT__.'Engine/Packages/Autoload/Autoload.php');

        $Mapper = new Mapper();
        $modules = new Modules($Mapper);
        $className = $modules->load();
        $factory = new Factory();
        $class = $factory($className);
        $requiredMethod = $Mapper->Method;
        $requiredParameters = $Mapper->Parameters;

        if (empty($requiredParameters)){
            $class->$requiredMethod();
        }else{
            $class->$requiredMethod($requiredParameters);
        }

    }

}

?>