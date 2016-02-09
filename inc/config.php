<?php
// Connexion à la DB
$dsn = 'mysql:dbname=yelp;host=192.168.210.77;charset=UTF8';
$user = 'yelp';
$password = '123';

// Effectuer la connexion
$pdo = new PDO($dsn, $user, $password);

// J'initiale le titre de mes pages (valeur par défaut)
$pageTitle = 'Yelp inscription';
?>