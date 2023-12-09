<?php


class RouteEditPokemon extends Route{

    private PokemonController $controller;

    public function __construct(PokemonController $controller) {
        //parent::__construct($controller);
        $this->controller = $controller;
    } 


    public function get($params = []){

        try {
            $id = parent::getParam($_GET, 'id');
    
            $this->controller->displayEditPokemon($id);
        }
        catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controller->displayAddPokemon();
        }
    
        
    }


    public function post($params = []){
        try {
            $id = $data["idPokemon"] = parent::getParam($params, "idPokemon", false);
            $data["nomEspece"] = parent::getParam($params, "nomEspece", false);
            $data["typeOne"] = parent::getParam($params, "typeOne", false);
            $data["typeTwo"] = parent::getParam($params, "typeTwo", false);
            $data["description"] = parent::getParam($params, "description", false);
            $data["urlImg"] = parent::getParam($params, "urlImg", false);
    
            $this->controller->editPokemonAndIndex($data);
        }
        catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controller->displayEditPokemon($id,$e->getMessage());
        }
        
    }

}





?>