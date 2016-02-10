<?php

function print_pre($var, $return=false) {
	if ($return) {
		return '<pre>'.print_r($var,1).'</pre>';
	}
	else {
		echo '<pre>'.print_r($var,1).'</pre>';
	}
}

function getAllCat() {
	global $pdo;

	// J'initialise ma variable de retour
	$myList = array();
	
	$sql = '
		SELECT cat_id, cat_nom
		FROM categorie
	';
	$pdoStatement = $pdo->query($sql);
	if ($pdoStatement && $pdoStatement->rowCount() > 0) {
		$myList = $pdoStatement->fetchAll();
	}

	return $myList;
}