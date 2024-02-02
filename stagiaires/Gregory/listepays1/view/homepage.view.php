<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pays du monde</title>
</head>
<body>
    <h1>Les pays du monde</h1>
    <h3>Nombre de pays dans notre liste: <?=$nb_pays?></h3>
    <pre><code>
        while($item = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo "$item";
        }
    </code></pre>
    <div>
        <?php
            while($item = $query->fetch(PDO::FETCH_ASSOC)):
        ?>
        <p><?=$item["nom"]?></p>
        <?php
            endwhile;
        ?>
    </div>
</body>
</html>