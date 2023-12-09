<?php


abstract class Route{
 
 
    public function action(?array $params = null, $method = 'GET'){
        if($method == 'GET') $this->get($params);
        else $this->post($params);
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