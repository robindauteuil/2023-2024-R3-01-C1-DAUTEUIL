<?php


abstract class Route2{
 
 
    protected $controller;

    public function __construct(MainController $controller) {
        $this->controller = $controller;}


    public function action($params = [], $method = 'GET'){
        if($method == 'GET') $this->get($params);
    }

    abstract protected function get($params = []);

    abstract protected function post($params = []);




    static function getParam(array $array, string $paramName, bool $canBeEmpty=true)
    {
        if (isset($array[$paramName])) {
            if(!$canBeEmpty && empty($array[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $array[$paramName];
        } else
            throw new Exception("Paramètre '$paramName' absent");
    }


    


}





?>