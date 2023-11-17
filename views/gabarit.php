

 

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titre ?></title>
</head>

<body> 
<header>
    <!-- Menu -->
<ul class="nav">
    <li><a href="index.php?action=add-pokemon">add-pokemon</a></li>
    <li><a href="index.php?action=add-pokemon-type"> add-pokemon-type</a></li>
    <li><a href="index.php?action=search"> search</a></li>
    <li><a href="index.php">Index</a></li>
</ul>
</header> 
<?= $contenu ?> 
<main id="contenu">

</main>
<footer>

</footer>
</body>

</html>