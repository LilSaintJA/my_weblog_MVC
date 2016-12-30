<?php

$connectBDD = new PDO('mysql:dbname=test_blog;host=localhost', 'root', '');

$connectBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = "INSERT INTO billet SET titre_post='Mon titre', date='" . date('Y-m-d H:i:s') . "'";

$count_row = $connectBDD->exec($req);

var_dump($count_row);

?>

<!-- **************************** -->
<!-- *** $connectBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); *** -->
<!-- Permet de debug PDO et renvoie les erreurs et les exceptions concernant la requête -->
