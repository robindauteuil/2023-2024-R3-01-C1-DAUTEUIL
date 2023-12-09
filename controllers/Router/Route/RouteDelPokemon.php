<?php


class RouteDelPokemon extends Route{

    private PokemonController $controller;

    public function __construct(PokemonController $controller) {
        //parent::__construct($controller);
        $this->controller = $controller;
    } 

    public function get($params = []) {

        try {
        $id = parent::getParam($_GET, 'id');

        $this->controller->deletePokemonAndIndex($id);
        }
        catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controller->deletePokemonAndIndex();
        }

    }

    public function post($params = []) {
        // Logique pour la méthode POST
    }
}
