<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>listepays</h1>
    <h2>Liste de tous les pays du monde</h2>
    <h3>Nombre de pays : <?=$countQuery?></h3>
    <p><pre><code>Utilisation du while sur un PDOstatement</code>
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        echo "$item[nom]";
    }

    <code></pre></p>

    <?php var_dump($query)?>

    <h4>Liste des pays</h4>
    <?php
    // while avec fetch, liste chaque élément du PDOstatement avec le fetch
    // alternative au fetchAll et foreach
    while($item = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<p>$item[nom]</p>";
    } 
    ?>
</body>
</html>