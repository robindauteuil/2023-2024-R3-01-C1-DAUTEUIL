<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/addPokemon.css"/>
    <?php
        if(!isset($pokemon)){
        echo '<title>Ajouter un nouveau Pokémon</title>';
        }
        else echo '<title>Modifier votre Pokémon</title>';
    ?>
    
</head>
<body>
    <?php
        if(!isset($pokemon)){
        echo '<h1>Ajouter un nouveau Pokémon</h1>';
        }
        else echo '<h1>Modifier votre Pokémon</h1>';
    ?>


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






<form <?php if (isset($pokemon)) echo 'action="index.php?action=edit-Pokemon" '; else echo 'action="index.php?action=add-pokemon" '; ?>  method="POST">
    <?php
        if(isset($pokemon)){
        echo '<input type="hidden" id="idPokemon" name="idPokemon" value="'.$pokemon->getIdPokemon().'">';

        }
    ?>


    <label for="nomEspece">Nom de l'espèce :</label>
    <input type="text" id="nomEspece" name="nomEspece"  value="<?= isset($pokemon) ? htmlspecialchars($pokemon->getNomEspece()) : ''; ?>" ><br>

    <label for="description">Description :</label>
    <input id="description" name="description" type="text" value="<?= isset($pokemon) ? htmlspecialchars($pokemon->getDescription()) : ''; ?>" ></input><br>

    <label for="typeOne">Premier type :</label>
    <select id="typeOne" name="typeOne" >
    <?php foreach ($types as $type) {
        // Vérifier si le Pokémon a un type et si ce type correspond à l'option actuelle
        $isSelected = isset($pokemon) && $pokemon->getTypeOne()->getIdType() == $type->getIdType();
        echo '<option value="' . htmlspecialchars($type->getIdType()) . '"' . ($isSelected ? ' selected' : '') . '>' . htmlspecialchars($type->getNomType()) . '</option>';
    } ?>
    </select>

    <label for="typeTwo">Deuxième type :</label>
    <select id="typeTwo" name="typeTwo" >
    <?php foreach ($types as $type) {
        // Vérifier si le Pokémon a un typeTwo et si ce type correspond à l'option actuelle
        $isSelected = isset($pokemon) && $pokemon->getTypeTwo() !== null && $pokemon->getTypeTwo()->getIdType() == $type->getIdType();
        echo '<option value="' . htmlspecialchars($type->getIdType()) . '"' . ($isSelected ? ' selected' : '') . '>' . htmlspecialchars($type->getNomType()) . '</option>';
    } ?>
    </select>
    

    <label for="urlImg">URL de l'image :</label>
    <input type="text" id="urlImg" name="urlImg"  value="<?= isset($pokemon) ? htmlspecialchars($pokemon->getUrlImg()) : ''; ?>"><br>

    <input type="submit" <?php if (isset($pokemon)) echo 'value= "Modifier le Pokémon" '; else echo 'value= "Ajouter le Pokémon" '; ?> >
</form>

</body>
</html> 