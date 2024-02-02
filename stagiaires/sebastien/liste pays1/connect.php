<?php

// paramètres de connexions
require_once "config.php";

# Connexion PDO
try {
    $connectPDO = new PDO(
        MY_DB_DRIVER.':host='.MY_DB_HOST.';port='.MY_DB_PORT.';dbname='.MY_DB_NAME.';charset='.MY_DB_CHARSET,
        MY_DB_LOGIN,
        MY_DB_PWD
    );
    /*
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    */
}catch(Exception $e){
    die($e->getMessage());

}