<?php



class RouteAddPokemon extends Route{

    private PokemonController $controler;

    public function __construct(PokemonController $controller) {
        $this->controler = $controller;
    } 



    //affiche le formulaire d ajout 
    public function get($params = []){
        $this->controler->displayAddPokemon();
    }



    //creer un nouveau pokemon avec les données de $_POST
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