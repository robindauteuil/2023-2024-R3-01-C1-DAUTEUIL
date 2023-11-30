<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Pokémon</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajuster le chemin si nécessaire -->
</head>
<body>

    <h2>Recherche de Pokémon</h2>

    <form action="traitement_recherche.php" method="get">
        <label for="champRecherche">Champ de Recherche :</label>
        <select id="champRecherche" name="champRecherche">
            <?php
            // Obtenez la liste des propriétés de la classe Pokemon
            $proprietes = Pokemon::getProprietes();

            // Générez dynamiquement les options du menu déroulant
            foreach ($proprietes as $propriete) {
                echo "<option value='$propriete'>$propriete</option>";
            }
            ?>
        </select>

        <label for="valeurRecherche">Valeur de Recherche :</label>
        <input type="text" id="valeurRecherche" name="valeurRecherche" required>

        <button type="submit">Rechercher</button>
    </form>

</body>
</html>