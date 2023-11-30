<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/addPokemon.css"/>
    <title>Ajouter un nouveau Pokémon</title>
</head>
<body>

<h2>Ajouter un nouveau Pokémon</h2>

<form action="traitement_pokemon.php" method="post">
    <label for="nomEspece">Nom de l'espèce :</label>
    <input type="text" id="nomEspece" name="nomEspece" required><br>

    <label for="description">Description :</label>
    <textarea id="description" name="description" rows="4" required></textarea><br>

    <label for="typeOne">Premier type :</label>
    <input type="text" id="typeOne" name="typeOne" required><br>

    <label for="typeTwo">Deuxième type :</label>
    <input type="text" id="typeTwo" name="typeTwo"><br>

    <label for="urlImg">URL de l'image :</label>
    <input type="text" id="urlImg" name="urlImg"><br>

    <input type="submit" value="Ajouter le Pokémon">
</form>

</body>
</html> 