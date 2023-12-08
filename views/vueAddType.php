<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Type</title>
    <link rel="stylesheet" href="public/css/addPokemon.css"> <!-- Assurez-vous d'ajuster le chemin si nécessaire -->
</head>
<body>

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


    <form action="index.php?action=add-pokemon-type" method="post">
        <label for="nomType">Nom du Type :</label>
        <input type="text" id="nomType" name="nomType" >
        <input type="text" id="urlImg" name="urlImg"  ><br>

        <button type="submit">Ajouter Type</button>
    </form>

</body>
</html>