<?php

include('../Route.php');


  
class RouteIndex extends Route{

    private MainController $controler;

    public function __construct(MainController $controller) {
        parent::__construct($controller);
    }
  

    public function get($params = []){
        $this->controler->index();
        echo "test";
    }


    public function post($params = []){
        $this->controler->index();
    }





}








?>