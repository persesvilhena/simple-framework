<?php
namespace Simple\Mvc;

class View extends Mvc
{
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
            $url = new \Simple\Http\Url;
            return $url->BaseUrl();
        }
        require_once(__ROOT__.'Modules/'.$this->url[0].'/View/'.$this->viewName.'.php');
    }

}