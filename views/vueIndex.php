

 
<h1>Pokédex de <?= $nomDresseur ?></h1>


<?php 
if(isset($message)){ 
   
    echo '<style>';
    echo '.erreur {';
    echo '    color: #ff0000; /* Couleur rouge */';
    echo '    font-weight: bold;';
    echo '    margin-bottom: 10px;';
    echo '}';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    
    echo '<div class="erreur">';
    echo '<p>' . $message . '</p>';
    echo '</div>';
    

}

?>



<?php foreach ($all as $pokemon) { ?>
    <table border="1">
        <tr>
            <th>idPokemon</th>
            <th>nom espece</th>
            <th>description</th>
            <th>premier type</th> 
            <th>second type</th>
            <th>Photo</th>
            <th>option</th>
        </tr>
        <tr>
            <td><?php echo $pokemon->getIdPokemon(); ?></td>
            <td><?php echo $pokemon->getNomEspece(); ?></td>
            <td><?php echo $pokemon->getDescription(); ?></td>
            <td><?php echo $pokemon->getTypeOne(); ?></td>
            <td><?php echo $pokemon->getTypeTwo(); ?></td>
            <td><?php echo $pokemon->getUrlImg(); ?></td>
            <td>
                <a class='edit-button' href='index.php?action=edit-Pokemon&id=<?php echo $pokemon->getIdPokemon(); ?>'>edit</a>
                <a class='delete-button' href='index.php?action=del-pokemon&id=<?php echo $pokemon->getIdPokemon(); ?>'>del</a>
            </td>
        </tr>
    </table>
<?php } ?>




