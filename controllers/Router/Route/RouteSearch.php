<?php



class RouteSearch extends Route{

    private PokemonController $controler;

    public function __construct(PokemonController $controller) {
        //parent::__construct($controller);
        $this->controler = $controller;
    } 


    public function get($params = []){
        $this->controler->displaySearch();
    }


    public function post($params = []){

        try {
            // Récupérer les valeurs nécessaires avec getParam
            $data["champRecherche"] = parent::getParam($params, "champRecherche", false);
            $data["valeurRecherche"] = parent::getParam($params, "valeurRecherche", false);

            // Un tableau associatif des champs et de leurs types attendus
            $expectedTypes = [
                'nomEspece' => 'string',
                'idPokemon' => 'int',
                'description' => 'string',
                
            ];



                // Vérifier si le champ de recherche est valide et déterminer le type attendu
        if (array_key_exists($data["champRecherche"], $expectedTypes)) {
            $typeAttendu = $expectedTypes[$data["champRecherche"]];

            // Vérifier le type de la valeur de recherche
            $isTypeValid = false;
            switch ($typeAttendu) {
                case 'int':
                    $isTypeValid = ctype_digit(strval($data["valeurRecherche"]));
                    break;
                case 'string':
                    // Vérifiez que la valeur de recherche est une chaîne et n'est pas numérique
                    $isTypeValid = !ctype_digit(strval($data["valeurRecherche"]));
                    break;
                case 'float':
                    $isTypeValid = is_float($data["valeurRecherche"]) || (is_numeric($data["valeurRecherche"]) && strpos($data["valeurRecherche"], '.') !== false);
                    break;
                // ajoutez d'autres cas au besoin
            }

            // Utiliser $isTypeValid pour décider de la suite des actions
            if ($isTypeValid) {
                $this->controler->search($data);
                // effectuer la recherche
            } else {
                throw new Exception("Le type de la valeur de recherche est invalide pour le champ {$data["champRecherche"]}.");
            }
        } 

        else {
            throw new Exception("Le champ de recherche spécifié est inconnu.");
        }


            // Appeler la méthode du contrôleur avec les données
            
        } catch (Exception $e) {
            // Afficher le formulaire avec un message d'erreur
            $this->controler->displaySearch($e->getMessage());
        }


        
    }

}





?>