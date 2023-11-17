<?php


class RouteAddPokemon extends Route{

    private MainController $controler;

    public function __construct(MainController $controller) {
        parent::__construct($controller);
    }


    public function get($params = []){
        $this->controler->displayAddPokemon();
    }


    public function post($params = []){
        $this->controler->index();
    }





?>