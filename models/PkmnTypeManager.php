<?php
require_once('Model.php');
require_once('Pkmntype.php');

class PkmnTypeManager extends Model
{
    private array $pkmnTypes;




    //renvoie un tableau de tous les types
    public function getAll() : array
    {
        parent::getDB();
        $result = parent::execRequest('select * from PKMN_TYPE');

        $pokemontypeArray = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $pt = new PkmnType($row);
            $pokemontypeArray[] = $pt;
            
        }
        return $pokemontypeArray;

    }




    // renvoie le type qui correspond à l id en parametre(renvoie une exception si le type n existe pas)
    public function getById(int $id) : ?pkmnType
    {
        parent::getDB();
        $idType["idType"] = $id;
        $type = null;
        $result = parent::execRequest('select * from PKMN_TYPE where idType = :idType', $idType);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row)
        {
            $type = new PkmnType($row);
        }
        else
        {
            throw new Exception("le type n est pas valide");
        }

        return $type;

    }



    //ajoute un le nouveau type passé en parametre 
    public function createPkmnType(PkmnType $pkmnType) 
    {
        $typeArray = $pkmnType->toArray();
        
        
        // Construction de la requête SQL pour l'insertion de données
        // Convertit les clés du tableau en chaîne pour les colonnes et les valeurs
        $columns = implode(', ', array_keys($typeArray));
        $values = ':' . implode(', :', array_keys($typeArray));
        $sql = "INSERT INTO PKMN_TYPE ($columns) VALUES ($values)";
        parent::getDB();
        
        $res = parent::execRequest($sql,$typeArray);

        return $res;

    }


    public function deletePkmnType(?int $id = null) {
        parent::getDB();
        $idtype["idType"] = $id;

        // Exécute une requête SQL pour supprimer un type de Pokémon par son ID
        $rc = parent::execRequest("DELETE FROM PKMN_TYPE WHERE idType = :idType", $idtype);
        

        // Vérifie si des lignes ont été affectées par la requête
        $rowCount = $rc->rowCount();
        if($rowCount>0) $res = true;
        else $res = false;
        return $res;
    }



    

    public function editPkmnTypet(Pkmntype $pkmnType)
    {
        parent::getDB();
        
        if($dataPokemon['typeOne']==$dataPokemon['typeTwo'])$dataPokemon['typeTwo'] = null;
        $idPokemon = $dataPokemon['idPokemon'];
        $columns = implode(', ', array_keys($dataPokemon));
        $values = ':' . implode(', :', array_keys($dataPokemon));

        if (isset($idPokemon)) {
            // Mise à jour
            $setValues = [];
            foreach ($dataPokemon as $key => $value) {
                $setValues[] = "$key = :$key";
            }

            $sql = "UPDATE pokemon SET " . implode(', ', $setValues) . " WHERE idPokemon = :idPokemon";
        } else {
            // Insertion
            $sql = "INSERT INTO pokemon ($columns) VALUES ($values)";
        }

        return parent::execRequest($sql, $dataPokemon);
    }

}


?>