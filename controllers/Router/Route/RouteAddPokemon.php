<?php

//include_once('../Route.php');
abstract class Route3{
 
 
    //protected $controller;

    //public function __construct(MainController $controller) {
      //  $this->controller = $controller;} 


    public function action(?array $params = null){
        if($params == null) $this->get();
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

class RouteAddPokemon extends Route3{

    private MainController $controler;

    public function __construct(MainController $controller) {
        //parent::__construct($controller);
        $this->controler = $controller;
    } 


    public function get($params = []){
        $this->controler->displayAddPokemon();
    }


    public function post($params = []){
        try {
            // Récupérer les valeurs nécessaires avec getParam
            $data["nomEspece"] = parent::getParam($params, "nomEspece", false);
            $data["typeOne"] = parent::getParam($params, "typeOne", false);
            $data["typeTwo"] = parent::getParam($params, "typeTwo", false);
            $data["description"] = parent::getParam($params, "description", false);
            $data["urlImg"] = parent::getParam($params, "urlImg", false);

            // Appeler la méthode du contrôleur avec les données
            $this->controler->addPokemon($data);
        } catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controler->displayAddPokemon($e->getMessage());
        }
    }

}





?>