<?php
$user='';
$pass='';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=yelp', $user, $pass);
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>