<?php
require "config.php";

try{
    $pdo = new PDO(
        MY_DB_DRIVER . ":host=" . MY_DB_HOST . ";port=" . MY_DB_PIG . ";dbname=" . MY_DB_NAME . ";charset=" . MY_DB_CHARSET,
        MY_DB_USER,
        MY_DB_PASS
    );
}catch(PDOException $e){
    die($e->getMessage());
}