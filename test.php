<?php

$url="http://api.railwayapi.com/v2/pnr-status/pnr/4333102418/apikey/b8a97bdhch/";
$str = file_get_contents($url);
$json = json_decode($str, true);
/*echo '<pre>' . print_r($json, true) . '</pre>';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php
    echo $json['reservation_upto']['name'];
    ?>
</body>
</html>