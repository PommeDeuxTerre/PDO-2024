<?php

//Controleur frontal

//chargement des dépendances 

require_once "../config.php";

//Tentative de connexion 

try{
    //Création d'une instance de PDO
  $db = new PDO(MY_DB_TYPE.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=".MY_DB_NAME.
  ";charset=".MY_DB_CHARSET, MY_DB_LOGIN, MY_DB_PWD);
}
catch(Exception $e){
        //arrêt du script et affichage de l'erreur
    die("Erreur : ".$e->getMessage());
}

//Requête sur la DB(model car gestion de données)

$sql = "SELECT * FROM countries";       //requête non-executé

$query = $db->query($sql);              //Exécution de la requête de type SELECT avec query()

 echo $countQuery = $query->rowCount();

 //Récupération du template d'affichage,
 //On utilisera la boucle while avec un fetch directement dans la vue
include "../view/homepage.view.php";

 //Déconnexion (bonne pratique)
 $db = null;