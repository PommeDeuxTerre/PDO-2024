<?php
/*
** Contrôleur frontal
*/

// chargement des dépendances
require_once "../config.php";

// tentative de connexion
try{
    // création d'une instance de PDO 
    $db = new PDO(MY_DB_TYPE.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=". MY_DB_NAME.";charset=".MY_DB_CHARSET, MY_DB_LOGIN, MY_DB_PWD);

    // on va mettre la valeur par défaut du format des fetch (la conversion des données récupérées en PHP) en tableau associatif, en utilisant PDO::FETCH_ASSOC
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// problème lors de la connexion, utilisation de la classe Exception    
}catch(Exception $e){

    // arrêt du script et affichage de l'erreur
    die("Erreur : ".$e->getMessage());
}

// requête sur la DB (model car gestion de données)

$sql = "SELECT * FROM countries"; // requête non exécutée

$query = $db->query($sql); // exécution de la requête de type SELECT avec query()

$countQuery = $query->rowCount(); // nombre de résultats de notre requête

// le fetchAll crée un tableau indexé qui contient les résultats 
// sous forme de tableau associatif (voir ligne près de la connexion) 
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$allCountries = $query->fetchAll();

echo count($allCountries);
/* récupération du template d'affichage, 
on utilisera la boucle while avec un fetch directement
dans la vue */

include "../view/homepage.view.php";

// bonne pratique (autres DB que MySQL ou MariaDB)
$query->closeCursor();

// déconnexion (bonne pratique)
$db=null;