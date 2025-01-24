<?php


class RouteEditPokemon extends Route{

    private PokemonController $controller;

    public function __construct(PokemonController $controller) {
        //parent::__construct($controller);
        $this->controller = $controller;
    } 



    public function get($params = []){

        try {
            //essaie de recuperer l id du pokemon à vérifier
            $id = parent::getParam($_GET, 'id');
    
            //affiche le formulaire de modifiaction prerempli avec les infos du pokemon
            $this->controller->displayEditPokemon($id);
        }
        catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controller->displayAddPokemon($id,$e->getMessage());
        }
    
        
    }


    public function post($params = []){
        try {


            //recupere les nouvelles infos du pokemons
            $id = $data["idPokemon"] = parent::getParam($params, "idPokemon", false);
            $data["nomEspece"] = parent::getParam($params, "nomEspece", false);
            $data["typeOne"] = parent::getParam($params, "typeOne", false);
            $data["typeTwo"] = parent::getParam($params, "typeTwo", false);
            $data["description"] = parent::getParam($params, "description", false);
            $data["urlImg"] = parent::getParam($params, "urlImg", false);
    

            //appelle la modifiaction avec ces infos
            $this->controller->editPokemonAndIndex($data);
        }
        catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controller->displayEditPokemon($id,$e->getMessage());
        }
        
    }

}





?>