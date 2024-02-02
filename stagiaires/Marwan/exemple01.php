<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion a PDO</title>
</head>
<body>
    <h1>Connexion avec PDO</h1>
    <?php
    $a=5;
    $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4;", // type, chemin et nom de la DB
                "root",
                "");
//tableau assiociatif par défaut lorsqu'on veut afficher des données 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

// on sélectionne tout de la table countries - SELECT => query
$firstQuery = $db->query("SELECT* FROM countries;");

//on affiche le nombres d'element recupere garve a la methode rowCount()
echo"<h3i>Il y a ".$firstQuery->rowCount()." pays dans la table countries </h3>";

// on doit formater les resultats pour que PHP sache comment les utliser
// ici fecthAll crée un tableau indexé contenant les valeurs au format
// PDO::FETCH_ASSOC => tableau associatif 
$resultFirstQuery = $firstQuery->fetchAll(PDO::FETCH_ASSOC);

// bonne pratique : remettre le pointeur de la requête à 0
// portabilité, inutile pour MySql et MariaDB 
$firstQuery->closeCursor();

// tant qu'on a des résultats
foreach($resultFirstQuery as $item){
    echo $item ["nom"].",";
}
var_dump($db,$firstQuery,$resultFirstQuery);
    // fermeture bonne pratique
    $db=null;
    ?>
</body>
</html>