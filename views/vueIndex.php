

 
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


<div class="card-container">
<?php 



foreach ($all as $key => $pokemon)  
    {
        echo '<div class="card">';
        
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $pokemon->getNomEspece(). '</h5>';
        echo '<img src="' . $pokemon->getUrlImg() . '" class="card-img-top" alt="Image Pokémon">';
        echo '<p class="card-text">Type One: ' . $pokemon->getTypeOne()?->getNomType() . '</p>';
        
        $typeTwo = $pokemon->getTypeTwo();
        if ($typeTwo !== null) {
            echo '<p class="card-text">Type Two: ' . $typeTwo->getNomType() . '</p>';
        } else {
            echo '<p class="card-text">Aucun Type Two</p>';
        }

        echo '<p class="card-text">Description: ' . $pokemon->getDescription() . '</p>';
        echo '<a class="btn btn-primary" href="index.php?action=edit-Pokemon&id=' . $pokemon->getIdPokemon() . '">Edit</a>';
        echo '<a class="btn btn-danger" href="index.php?action=del-Pokemon&id=' . $pokemon->getIdPokemon()  . '">Delete</a>';
        echo '</div>';
        echo '</div>';
    }


 ?>
 </div>




