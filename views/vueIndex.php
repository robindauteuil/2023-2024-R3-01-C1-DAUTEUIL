

 
<h1>Pokédex de <?= $nomDresseur ?></h1>



<?php foreach ($all as $pokemon) { ?>
    <table border="1">
        <tr>
            <th>idPokemon</th>
            <th>nom espece</th>
            <th>description</th>
            <th>premier type</th> 
            <th>second type</th>
            <th>option</th>
        </tr>
        <tr>
            <td><?php echo $pokemon->getIdPokemon(); ?></td>
            <td><?php echo $pokemon->getNomEspece(); ?></td>
            <td><?php echo $pokemon->getDescription(); ?></td>
            <td><?php echo $pokemon->getTypeOne(); ?></td>
            <td><?php echo $pokemon->getTypeTwo(); ?></td>
            <td>
                <a class='edit-button' href='index.php?action=edit-Pokemon&id=<?php echo $pokemon->getIdPokemon(); ?>'>edit</a>
                <a class='delete-button' href='index.php?action=del-pokemon&id=<?php echo $pokemon->getIdPokemon(); ?>'>del</a>
            </td>
        </tr>
    </table>
<?php } ?>




