<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Pokémon</title>
    <link rel="stylesheet" href="public/css/addPokemon.css"> <!-- Assurez-vous d'ajuster le chemin si nécessaire -->
</head>
<body>

    <h2>Recherche de Pokémon</h2>

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
    <form action="index.php?action=search" method="POST">
        <label for="champRecherche">Champ de Recherche :</label>
        <select id="champRecherche" name="champRecherche">
            <?php
            // Obtenez la liste des propriétés de la classe Pokemon 
            $proprietes = Pokemon::getProprietes();
       

        // Générez dynamiquement les options du menu déroulant
        foreach ($proprietes as $propriete) {
            $isSelected = $selectedChampRecherche === $propriete;
            echo "<option value='$propriete'" . ($isSelected ? ' selected' : '') . ">$propriete</option>";
        }
            ?>
        </select>

        
   
   
        <select id="typeSearch" name="typeSearch" >
            <?php foreach ($types as $type) {
                // Vérifier si le Pokémon a un type et si ce type correspond à l'option actuelle
                $isSelected = isset($pokemon) && $pokemon->getTypeOne()->getIdType() == $type->getIdType();
                echo '<option value="' . htmlspecialchars($type->getIdType()) . '"' . ($isSelected ? ' selected' : '') . '>' . htmlspecialchars($type->getNomType()) . '</option>';
            } ?>
        </select>
    
    

        <label for="valeurRecherche">Valeur de Recherche :</label>
        <input type="text" id="valeurRecherche" name="valeurRecherche">

        <button type="submit">Rechercher</button>
    </form>

</body>
</html>