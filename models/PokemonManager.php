<?php
require_once('Model.php');
require_once('Pokemon.php');

class PokemonManager extends Model{
 
    private array $pokemons;


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
            $pokemon->setTypeTwo($row['typeTwo']);
            $pokemon->setUrlImg($row['urlImg']);
            $pokemonArray[] = $pokemon;
        }

        return $pokemonArray;
    }


    public function getByID(int $idPokemon):?Pokemon{
        parent::getDB();
        $result = parent::execRequest('select * from pokemon where idPokemon = ?', [$idPokemon]);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $pokemon = new Pokemon();
            $pokemon->setIdPokemon($row['idPokemon']);
            $pokemon->setNomEspece($row['nomEspece']);
            $pokemon->setDescription($row['description']);
            $pokemon->setTypeOne($row['typeOne']);
            $pokemon->setTypeTwo($row['typeTwo']);
            $pokemon->setUrlImg($row['urlImg']);
            return $pokemon;
        } 
        else {
            return null; // Aucun Pokémon trouvé avec cet ID.
        }

        return $pokemon;
    } 


    public function createPokemon(Pokemon $pokemon){

        $pokemonArray = $pokemon->toArray();
        
        // Construction de la requête SQL
        $columns = implode(', ', array_keys($pokemonArray));
        $values = ':' . implode(', :', array_keys($pokemonArray));
        $sql = "INSERT INTO pokemon ($columns) VALUES ($values)";
        parent::getDB();
        //$sql = "insert into pokemon (nomEspece,typeOne) values ('salameche','feu')";
        //parent::execRequest($sql);
        $res = parent::execRequest($sql,$pokemonArray);


        $sql2 = "SELECT LAST_INSERT_ID() as last_id";
        $id = (int) parent::execRequest($sql2)->fetchColumn();

        
        return ['id' => $id, 'res' => $res];

    }

    public function deletePokemonAndIndex(int $id) {
        parent::getDB();
        $idPokemon["idPokemon"] = $id;
        $rc = parent::execRequest("DELETE FROM pokemon WHERE idPokemon = :idPokemon", $idPokemon);
        
        $rowCount = $rc->rowCount();
        if($rowCount>0) $res = true;
        else $res = false;
        return $res;
    }

}


?>