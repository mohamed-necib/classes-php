<!-- CONNEXION A LA BASE DE DONNEES -->

<?php

$hostName = "localhost";
$dbUSer = "root";
$dbPassword = "root";
$dbName = "classes";

$conn=mysqli_connect($hostName, $dbUSer, $dbPassword, $dbName);

if(!$conn) {
  die("La connexion a échouée");
}





?>