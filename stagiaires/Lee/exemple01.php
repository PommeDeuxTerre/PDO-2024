<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection à PDO</title>
</head>
<body>
    <h1>Connection avec PDO</h1>
    <?php
        $db = new PDO("mysql:host=localhost;port=3307;dbname=listepays;charset=utf8mb4","root","");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
       $firstQuery = $db->query("SELECT * FROM countries");
       echo "<h3>Il y a ".$firstQuery->rowCount()." dans la table countries</h3>";


       $resultFirstQuery = $firstQuery->fetchAll();
        
       foreach($resultFirstQuery as $item){
        echo $item['nom'].",<br> ";
       }
    ?>
</body>
</html>