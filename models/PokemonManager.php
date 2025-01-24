<?php
require_once('Model.php');
require_once('Pokemon.php');
require_once('PkmnTypeManager.php');

class PokemonManager extends Model{
 
    private array $pokemons;
    private PkmnTypeManager $typeManager ;

    public function __construct()
    {
        //$typeManager = new PkmnTypeManager();

    }


    public function getAll() : array{
        parent::getDB();
        $result = parent::execRequest('select * from pokemon');
        /*$pokemonArray = $result->fetch();
        return $pokemonArray;*/

        $pokemonArray = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $pokemon = new Pokemon();
            $pokemon->setIdPokemon($row['idPokemon']);
            $pokemon->setNomEspece($row['nomEspece']);
            $pokemon->setDescription($row['description']);
            $pokemon->setTypeOne($row['typeOne']);
            if(isset($row['typeTwo']))$pokemon->setTypeTwo($row['typeTwo']);
            $pokemon->setUrlImg($row['urlImg']);
            $pokemonArray[] = $pokemon;
        }

        return $pokemonArray;
    }


    public function getByID(int $id):?Pokemon{
        parent::getDB();
        $idPokemon["idPokemon"] = $id;
        $result = parent::execRequest('select * from pokemon where idPokemon = :idPokemon', $idPokemon);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $pokemon = null;
        if ($row) {
            $pokemon = new Pokemon();
            $pokemon->setIdPokemon($row['idPokemon']);
            $pokemon->setNomEspece($row['nomEspece']);
            $pokemon->setDescription($row['description']);
            $pokemon->setTypeOne($row['typeOne']);
            if(isset($row['typeTwo']))$pokemon->setTypeTwo($row['typeTwo']);
            $pokemon->setUrlImg($row['urlImg']);
            
        } 
        

        return $pokemon;
    } 



    //insere le pokemon passé en parametre dans la bdd
    public function createPokemon(Pokemon $pokemon){

        // Extraction des propriétés de l'objet Pokemon et stockage dans un tableau
        $pokemonArray['nomEspece'] = $pokemon->getNomEspece();
        $pokemonArray['description'] = $pokemon->getDescription();
        $pokemonArray['typeOne'] = $pokemon->getTypeOne()?->getIdType();
        $pokemonArray['typeTwo'] = $pokemon->getTypeTwo()?->getIdType();
        $pokemonArray['urlImg'] = $pokemon->getUrlImg();
        
        // Construction de la requête SQL
        $columns = implode(', ', array_keys($pokemonArray));
        $values = ':' . implode(', :', array_keys($pokemonArray));
        $sql = "INSERT INTO pokemon ($columns) VALUES ($values)";
        parent::getDB();
        
        $res = parent::execRequest($sql,$pokemonArray);



        // Récupération de l'ID du dernier enregistrement inséré
        $sql2 = "SELECT LAST_INSERT_ID() as last_id";
        $id = (int) parent::execRequest($sql2)->fetchColumn();

        

        // Retourne l'ID et le résultat de l'opération
        return ['id' => $id, 'res' => $res];

    }


    //supprime le pokemon dont l id est passé en parametre
    public function deletePokemonAndIndex(?int $id = null) {
        parent::getDB();
        $idPokemon["idPokemon"] = $id;
        // Exécution de la requête SQL pour supprimer un enregistrement de Pokémon
        $rc = parent::execRequest("DELETE FROM pokemon WHERE idPokemon = :idPokemon", $idPokemon);
        

        // Vérification du nombre de lignes affectées pour déterminer le succès de l'opération
        $rowCount = $rc->rowCount();
        if($rowCount>0) $res = true;
        else $res = false;

        // Retourne le résultat de l'opération de suppression
        return $res;
    }


    public function editPokemonAndIndex(array $dataPokemon){

        parent::getDB();
        

        // Assurez-vous que typeOne et typeTwo ne sont pas les mêmes
        if($dataPokemon['typeOne']==$dataPokemon['typeTwo'])$dataPokemon['typeTwo'] = null;
        
        $idPokemon = $dataPokemon['idPokemon'];
        
        $columns = implode(', ', array_keys($dataPokemon));
        $values = ':' . implode(', :', array_keys($dataPokemon));


        // Préparation de la requête SQL pour la mise à jour ou l'insertion
        //si le pokemon existe deja
        if (isset($idPokemon)) {
            $setValues = [];
            foreach ($dataPokemon as $key => $value) {
                $setValues[] = "$key = :$key";
            }

            $sql = "UPDATE pokemon SET " . implode(', ', $setValues) . " WHERE idPokemon = :idPokemon";
        } else {
            $sql = "INSERT INTO pokemon ($columns) VALUES ($values)";
        }

        return parent::execRequest($sql, $dataPokemon);
    }




    //recherche de pokemon selon le champ et la valeur dans le tableau en parametre
    public function search(array $paramsResearch)
    {
        parent::getDB();

        //stocke le critere de recherche dans une variable
        $champRecherche = $paramsResearch['champRecherche'];
        
        //stocke la valeur de recherche dans un tableau avec la clée correspondante
        $valeurRecherche['valeurRecherche'] = $paramsResearch['valeurRecherche'];


        $sql = "select idPokemon from pokemon where $champRecherche  = :valeurRecherche";
        //execute la  requete avec les parametres
        $result = parent::execRequest($sql,$valeurRecherche );
        $pokemons =[];
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $pokemon = null;
        if ($row) 
        {
            $pokemon = $this->getByID($row['idPokemon']);
            $pokemons[] = $pokemon;
        }
        
        //renvoie les pokemons correspondants à la recherche
        return $pokemons;
    }

}


?>