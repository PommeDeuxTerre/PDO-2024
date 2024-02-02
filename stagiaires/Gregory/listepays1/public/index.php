<?php

require_once("../config.php");


$PDOConnect = new PDO(
    MY_DB_DRIVER.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET,
    MY_DB_LOGIN,
    MY_DB_PWD);

$sql = "SELECT * FROM countries;";

$query = $PDOConnect->query($sql);

$nb_pays = $query->rowCount();

include_once "../view/homepage.view.php";

$query->closeCursor();
$PDOConnect = null;