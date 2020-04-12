<?php
require_once(__ROOT__.'Engine/Autoload.php');

$modules = new Modules();

$url = new Url;

$requiredController = $url->Return()[1];
$requiredMethod = $url->Return()[2];
$requiredParameters = array_slice($url->Return(), 3);


if (class_exists($requiredController)) {
    if(count($requiredParameters) == 0){
        array_push($requiredParameters, "");
    }
    $controller = new $requiredController;
    call_user_func_array(array($controller, $requiredMethod), $requiredParameters);
}else{
    $controller = new Errors;
    $controller->Error404();
}


?>