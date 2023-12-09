<?php


class RouteAddType extends Route{

    private PokemonController $controler;

    public function __construct(PokemonController $controller) {
        //parent::__construct($controller);
        $this->controler = $controller;
    } 


    public function get($params = []){
        $this->controler->displayAddType();
    }


    public function post($params = []){

        try {
            // Récupérer les valeurs nécessaires avec getParam
            $data["nomType"] = parent::getParam($params, "nomType", false);
            $data["urlImg"] = parent::getParam($params, "urlImg", false);


            // Appeler la méthode du contrôleur avec les données
            $this->controler->addPkmnType($data);
        } catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controler->displayAddType($e->getMessage());
        }
        
    }

}





?>