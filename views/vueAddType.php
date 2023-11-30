<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Type</title>
    <link rel="stylesheet" href="public/css/addPokemon.css"> <!-- Assurez-vous d'ajuster le chemin si nécessaire -->
</head>
<body>

    <form action="traitement_ajout_type.php" method="post">
        <label for="nomType">Nom du Type :</label>
        <input type="text" id="nomType" name="nomType" required>

        <button type="submit">Ajouter Type</button>
    </form>

</body>
</html>