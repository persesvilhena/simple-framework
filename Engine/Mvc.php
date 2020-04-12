<?php
class Mvc{
    public $url;

    public function __construct(){
        $url = new Url;
        $this->url = $url->Return();
    }

    protected function base_url(){
        $url = new Url;
        return $url->BaseUrl();
    }
}

class Controller extends Mvc{
    public function __construct(){
        parent::__construct();
        $this->loadModels();
    }
    
    public function loadModels(){
        $dir = __ROOT__.'Modules/'.$this->url[0].'/Model';
        $files = scandir($dir);
        foreach($files as $n){
            if(substr($n, -3) == "php"){
                require_once(__ROOT__.'Modules/'.$this->url[0].'/Model/'.$n);
            }
        }
    }
}

class Model extends Mvc{
    public function __construct(){
        parent::__construct();
        
    }

    
}

class View extends Mvc{
    private $viewName = null;

    public function __construct($viewName = null, $data = null){
        parent::__construct();
        $this->viewName = $viewName;
        $this->load($data);
    }

    

    private function load($data = null)
    {
        if($this->viewName == null){
            $this->viewName = "Index";
        }
        function base_url(){
            $url = new Url;
            return $url->BaseUrl();
        }
        require_once(__ROOT__.'Modules/'.$this->url[0].'/View/'.$this->viewName.'.php');
    }
}

?>