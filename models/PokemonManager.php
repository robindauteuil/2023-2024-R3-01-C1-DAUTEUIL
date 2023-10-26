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

}


?>