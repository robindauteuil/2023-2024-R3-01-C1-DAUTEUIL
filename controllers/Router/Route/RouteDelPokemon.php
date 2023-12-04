<?php

abstract class Route7 {
 
    public function action(?array $params = null, $method = 'GET') {
        if ($method == 'GET') {
            $this->get($params);
        } else {
            $this->post($params);
        }
    }

    abstract protected function get($params = []);

    abstract protected function post($params = []);

    static function getParam(array $array, string $paramName, bool $canBeEmpty = true) {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }
}

class RouteDelPokemon extends Route7 {

    private MainController $controller;

    public function __construct(MainController $controller) {
        //parent::__construct($controller);
        $this->controller = $controller;
    } 

    public function get($params = []) {
        $this->controller->deletePokemonAndIndex(parent::getParam($_GET, 'id'));
    }

    public function post($params = []) {
        // Logique pour la méthode POST
    }
}
