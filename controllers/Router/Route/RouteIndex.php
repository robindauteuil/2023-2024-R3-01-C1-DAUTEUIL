<?php

class RouteIndex extends Route{

    private MainController $controler;

    public function __construct(MainController $controller) {
        //parent::__construct();
        $this->controler = $controller;
    }
  

    public function get($params = []){
        $this->controler->index();
       
    }


    public function post($params = []){
        $this->controler->index();
    }

}








?>