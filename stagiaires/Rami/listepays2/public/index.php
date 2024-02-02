<?php
/*
Contrôleur frontal 
*/

//chargement des dépandances 

require_once "../config.php";

//tentative de connexion

try{
    $db= new PDO(
MY_DB_TYPE.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=". MY_DB_NAME.";charset=".MY_DB_CHARSET,
MY_DB_LOGIN,MY_DB_PWD
    );

}catch(Exception $e){
    die("Erreur : ".$e->getMessage());
}

//requéte sur la DB (model car gestion de données)

$sql="SELECT * FROM countries";

$query = $db->query($sql);

$countQuery= $query->rowCount();//nombre de résultat de notre réquete 

//récupzeration du template d'affichage, on utilisera la boucle while avec un fetch directmen dans la vue

include "../view/homepage.view.php";

//deconnexion bonne pratique 
$db=null;