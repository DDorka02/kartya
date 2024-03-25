<?php
        include_once "Adatbazis.php";
    ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar kártya</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
    <?php
        $adatbazis = new Adatbazis();
        $eredmeny= $adatbazis->adatLeker("kep","szin");
        while($sor=$eredmeny->fetch_row()) {
            echo "<img src=\"kepek/$sor[0]\" alt=\"$sor[0]\">";
        }
        echo '<br>';
    ?>   
</body>
</html>