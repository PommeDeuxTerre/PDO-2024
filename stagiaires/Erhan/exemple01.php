<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à PDO</title>
</head>
<body>
    <h1>Connexion avec PDO</h1>
    <?php

    $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4;",
                  "root",
                  "");

    $firstQuery = $db->query("SELECT * FROM countries;");

    echo "<h3>Il y a ".$firstQuery->rowCount()." pays dans la table countries </h3>";

    $resultFirstQuery = $firstQuery->fetchAll(PDO::FETCH_ASSOC);

    var_dump($db,$firstQuery);

    foreach($resultFirstQuery as $item){
        echo $item['nom'],", ";
    }

    $db = null;
    ?>
</body>
</html>