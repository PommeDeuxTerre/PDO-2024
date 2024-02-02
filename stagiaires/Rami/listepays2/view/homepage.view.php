<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listepays</title>
</head>
<body>
    <h1>Listepays</h1>
    <h2>Liste de tous les pays du monde </h2>
    <h3>Nombre de pays: <?=$countQuery?></h3>
    <p><code>Utilisation du while sur un PDOStatement :
        while($item=$query->fetch(PDO::FETCH_ASSOC)){
            echo "<p>$item[nom]</p>";
        }

    </code></p>
    <?php var_dump($query)?>

    <h3>Liste des pays</h3>
    <?php
    //while liste chaque élément du PDOStatementavec le fetch alternative au FetchAll et foreach
    
    while($item=$query->fetch(PDO::FETCH_ASSOC)){
            echo "<p>$item[nom]</p>";}
            ?>
    
</body>
</html>