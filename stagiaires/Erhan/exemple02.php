<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à PDO</title>
</head>
<body>
    <h1>Connexion avec PDO + bonnes pratiques</h1>
    <?php

    $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4;",
                  "root",
                  "",
                );

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $firstQuery = $db->query("SELECT * FROM countries;");

    echo "<h3>Il y a ".$firstQuery->rowCount()." pays dans la table countries </h3>";

    $resultFirstQuery = $firstQuery->fetchAll();

    $firstQuery->closeCursor();    

    foreach($resultFirstQuery as $item){
        echo $item['nom'],", ";
    }

    $resultFirstQuery = null;

    var_dump($db,$firstQuery,$resultFirstQuery);
    
    $db = null;

    ?>
</body>
</html>