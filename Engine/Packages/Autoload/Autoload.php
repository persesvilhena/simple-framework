<?php
spl_autoload_register(
    
    function($class){
        $autoloadFiles = array(
            'Simple\Core\Modules' => __ROOT__.'Engine/Packages/Core/Modules.php',
            'Simple\Core\Factory' => __ROOT__.'Engine/Packages/Core/Factory.php',
            'Simple\Core\Mapper' => __ROOT__.'Engine/Packages/Core/Mapper.php',
            'Simple\Http\Request' => __ROOT__.'Engine/Packages/Http/Request.php',
            'Simple\Http\Response' => __ROOT__.'Engine/Packages/Http/Response.php',
            'Simple\Mvc\Mvc' => __ROOT__.'Engine/Packages/Mvc/Mvc.php',
            'Simple\Mvc\Controller' => __ROOT__.'Engine/Packages/Mvc/Controller.php',
            'Simple\Mvc\Model' => __ROOT__.'Engine/Packages/Mvc/Model.php',
            'Simple\Mvc\View' => __ROOT__.'Engine/Packages/Mvc/View.php',
            'Simple\Http\Url' => __ROOT__.'Engine/Packages/Http/Url.php',
            'Simple\Errors\Error404' => __ROOT__.'Engine/Packages/Errors/Error404.php',
            'Simple\Database\DatabaseInterface' => __ROOT__.'Engine/Packages/Database/DatabaseInterface.php',
            'Simple\Database\Database' => __ROOT__.'Engine/Packages/Database/Database.php'
        );
        //var_dump('<pre>', $autoloadFiles[$class], '</pre>');
        require_once($autoloadFiles[$class]);
    }
);
?>