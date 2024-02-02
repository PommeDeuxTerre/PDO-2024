<?php

// Contrôleur frontale

// chargement des dépendances 

require_once "../config.php";

// tentative de connexion 

try {
    // création d'une instance de PDO
    $db = new PDO(MY_DB_TYPE.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET, MY_DB_LOGIN, MY_DB_PWD);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur
    die("Erreur : ". $e->getMessage());
}

// requête sur la DB (model car gestion de données)

$sql = "SELECT * FROM countries";

$query = $db->query($sql); //exécution de la requête de type SELECT avec query()

$countQuery = $query->rowCount(); // nombre de résultats de notre requête 

// récuperation du template d'affichage, on utilisera la boucle while avec un fetch directement dans la vue

include "../view/homepage.view.php";

// déconnexion (bonne pratique)
$query->closeCursor();

$db = null;