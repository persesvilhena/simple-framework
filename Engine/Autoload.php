<?php
spl_autoload_register(
    
    function($class){
        $autoloadFiles = array(
            'Modules' => __ROOT__.'Engine/Modules.php',
            'Input' => __ROOT__.'Engine/IO.php',
            'Mvc' => __ROOT__.'Engine/Mvc.php',
            'Controller' => __ROOT__.'Engine/Mvc.php',
            'Model' => __ROOT__.'Engine/Mvc.php',
            'View' => __ROOT__.'Engine/Mvc.php',
            'Url' => __ROOT__.'Engine/Url.php'
        );
        require_once($autoloadFiles[$class]);
    }
);
?>