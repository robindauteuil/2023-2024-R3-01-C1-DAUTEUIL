

 
<h1>Pokédex de <?= $nomDresseur ?></h1>



<table border="1">
        <tr>
            <th>idPokemon</th>
            <th>nom espece</th>
            <th>description</th>
            <th>premier type</th>
            <th>second type</th>
            <th>option</th>
            
        </tr>
        <?php
        // Supposons que $pika est un tableau d'objets Pokémon
        foreach ($all as $pokemon) {
            echo "<tr>";
            echo "<td>" . $pokemon->getIdPokemon() . "</td>";
            echo "<td>" . $pokemon->getNomEspece() . "</td>";
            echo "<td>" . $pokemon->getDescription() . "</td>";
            echo "<td>" . $pokemon->getTypeOne() . "</td>";
            echo "<td>" . $pokemon->getTypeTwo() . "</td>";
            echo "<td><a class='edit-button' href='index.php?action=edit-Pokemon&id=" . $pokemon->getIdPokemon() . "'>edit</a> <a class='delete-button' href='index.php?action=del-pokemon&id=" . $pokemon->getIdPokemon() . "'>del</a></td>";
            
            echo "</tr>";
        }
        ?>
        
    </table>




