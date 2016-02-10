<?php
$user='';
$pass='';
try {
    $dbh = new PDO('mysql:host=192.168.210.77;dbname=yelp', 'yelp', '123');
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>