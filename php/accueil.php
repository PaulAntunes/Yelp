<?php 

/*
idbuisness
nomBuisness
typeBuisness
adresseBuisness
codepostBuisness
villeBuisness
infosBuisness
photoBuisness
gpsLatBuisness
gpsLongBuisness
*/
if (!empty($_POST)) {
	//print_pre($_POST);
	// Récupération et traitement des variables du formulaire d'ajout/modification
	$idbuisness = isset($_POST['idbuisness']) ? intval(trim($_POST['idbuisness'])) : 0;
	$typeBuisness = isset($_POST['typeBuisness']) ? intval(trim($_POST['typeBuisness'])) : '';
	$gpsLongBuisness = isset($_POST['gpsLongBuisness']) ? intval(trim($_POST['gpsLongBuisness'])) : 0;
	$nomBuisness = isset($_POST['nomBuisness']) ? trim($_POST['nomBuisness']) : '';
	$gpsLatBuisness = isset($_POST['gpsLatBuisness']) ? intval(trim($_POST['gpsLatBuisness'])) : 0;
	$codepostBuisness = isset($_POST['codepostBuisness'])? intval(trim($_POST['codepostBuisness'])) : 0;
	$infosBuisness = isset($_POST['infosBuisness']) ? trim($_POST['infosBuisness']) : '';
	$villeBuisness = isset($_POST['villeBuisness']) ? trim($_POST['villeBuisness']) : '';
	$photoBuisness = isset($_POST['photoBuisness']) ? trim($_POST['photoBuisness']) : '';
	$adresseBuisness = isset($_POST['adresseBuisness']) ? trim($_POST['adresseBuisness']) : '';

	// si l'id dans le formulaire est > 0 => film existant => modification
	if ($idbuisness > 0) {
		// J'écris ma requête dans une variable
		$updateSQL = '	UPDATE buisness
			SET nomBuisness = :nomBuisness,
			typeBuisness = :typeBuisness,
			gpsLongBuisness = :gpsLongBuisness,
			gpsLatBuisness = :gpsLatBuisness,
			codepostBuisness = :codepostBuisness,
			infosBuisness = :infosBuisness,
			villeBuisness = :villeBuisness,
			photoBuisness = :photoBuisness,
			etoileBuisness = :etoileBuisness
			adresseBuisness = :adresseBuisness
			WHERE idbuisness = :idbuisness
		';
		// Je prépare ma requête
		$pdoStatement = $pdo->prepare($updateSQL);
		// Je bind toutes les variables de requête
		$pdoStatement->bindValue(':nomBuisness', $nomBuisness);
		$pdoStatement->bindValue(':typeBuisness', $typeBuisness);
		$pdoStatement->bindValue(':gpsLongBuisness', $gpsLongBuisness);
		$pdoStatement->bindValue(':gpsLatBuisness', $gpsLatBuisness);
		$pdoStatement->bindValue(':idbuisness', $idbuisness);
		$pdoStatement->bindValue(':codepostBuisness', $codepostBuisness);
		$pdoStatement->bindValue(':infosBuisness', $infosBuisness);
		$pdoStatement->bindValue(':villeBuisness', $villeBuisness);
		$pdoStatement->bindValue(':photoBuisness', $photoBuisness);
		$pdoStatement->bindValue(':adresseBuisness', $adresseBuisness);

		// J'exécute la requête, et ça me renvoi true ou false
		if ($pdoStatement->execute()) {
			// Je redirige sur la même page
			// Pas de formulaire soumis sur la page de redirection => pas de POST
			header('Location: accueil.php?id='.$idbuisness);
			exit;
		}
	}
	// Sinon Ajout
	/*else {
		// J'écris ma requête dans une variable
		$insertInto = '	INSERT INTO buisness (nomBuisness, typeBuisness, gpsLongBuisness, gpsLatBuisness, codepostBuisness, infosBuisness, villeBuisness,photoBuisness,adresseBuisness)
						VALUES (:nomBuisness, :typeBuisness, :gpsLongBuisness, :gpsLatBuisness, :codepostBuisness, :infosBuisness, :villeBuisness, :photoBuisness, :adresseBuisness)
		';
		// Je prépare ma requête
		$pdoStatement = $pdo->prepare($insertInto);
		// Je bind toutes les variables de requête
		$pdoStatement->bindValue(':nomBuisness', $nomBuisness);
		$pdoStatement->bindValue(':typeBuisness', $typeBuisness);
		$pdoStatement->bindValue(':gpsLongBuisness', $gpsLongBuisness);
		$pdoStatement->bindValue(':gpsLatBuisness', $gpsLatBuisness);
		$pdoStatement->bindValue(':codepostBuisness', $codepostBuisness);
		$pdoStatement->bindValue(':infosBuisness', $infosBuisness);
		$pdoStatement->bindValue(':villeBuisness', $villeBuisness);
		$pdoStatement->bindValue(':photoBuisness', $photoBuisness);
		$pdoStatement->bindValue(':adresseBuisness', $adresseBuisness);

		// J'exécute la requête, et ça me renvoi true ou false
		if ($pdoStatement->execute()) {
			$newId = $pdo->lastInsertId();
			// Je redirige sur la même page, à laquelle j'ajoute l'id du film créé => modification
			// Pas de formulaire soumis sur la page de redirection => pas de POST
			header('Location: accueil.php?id='.$newId);
			exit;
		}
	}*/
}

// J'initialise mes variables pour l'affichage du formulaire/de la page
$currentId = 0;
$typeBuisness = '';
$gpsLongBuisness = 0;
$gpsLatBuisness = 0;
$codepostBuisness = 0;
$nomBuisness = '';
$infosBuisness = '';
$villeBuisness = '';
$adresseBuisness= '';
$photoBuisness= '';
$yelp = '';
$yelpResultsList = array();
$noYelpResult = false;

// Si l'id est passé en paramètre de l'URL : "form_film.php?id=54" => $_GET['id'] à pour valeur 54
if (isset($_GET['id'])) {
	// Je m'assure que la valeur est un integer
	$currentId = intval($_GET['id']);

	// J'écris ma requête dans une variable
	$sql = 'SELECT typeBuisness, gpsLongBuisness, gpsLatBuisness, codepostBuisness, nomBuisness, infosBuisness, villeBuisness, adresseBuisness, photoBuisness
	FROM buisness
	WHERE idbuisness = '.$currentId;
	// J'envoi ma requête à MySQL et je récupère le Statement
	$pdoStatement = $pdo->query($sql);
	// Si la requête a fonctionnée et qu'on a au moins une ligne de résultat
	if ($pdoStatement && $pdoStatement->rowCount() > 0) {
		// Je "fetch" les données de la première ligne de résultat dans $resList
		$resList = $pdoStatement->fetch();

		// Je récupère toutes les valeurs que j'affecte dans les variables destinées à l'affichage du formulaire
		// => ça me permet de pré-remplir le formulaire
		$typeBuisness = ($resList['typeBuisness']);
		$gpsLongBuisness = intval($resList['gpsLongBuisness']);
		$gpsLatBuisness = intval($resList['gpsLatBuisness']);
		$codepostBuisness = intval($resList['codepostBuisness']);
		$nomBuisness = $resList['nomBuisness'];
		$infosBuisness = $resList['infosBuisness'];
		$villeBuisness = $resList['villeBuisness'];
		$adresseBuisness = $resList['adresseBuisness'];
		$photoBuisness = $resList['photoBuisness'];
		
	}
}

// Si un titre de film yelp est passé en paramètre de l'URL : "form_film.php?yelp=the+matrix" => $_GET['yelp'] à pour valeur "the matrix"
// => Si une recherche sur le titre yelp a été effectuée
if (isset($_GET['yelp'])) {
	// Je traite la chaine de caractères
	$yelp = strip_tags(trim($_GET['yelp']));

	/*// On inclut nos packages composer, avec l'API yelp
	require_once 'vendor/autoload.php';*/

	// NE PAS retenir try - catch pour l'instant
	/*try {
		// J'effectue d'abord une recherche sur les termes passés en paramètre d'URL
!!!!!!!!!WHAT DO I DO HERE??									$yelpResultsList = \Jleagle\yelp\yelp::search($yelp); 			/***!!!!**/
		//print_pre($yelpResultsList);exit;*/
	/*}*/
	/*catch (Exception $e) {
		// Si une erreur survient, alors on n'a aucun résultat
		$noYelpResult = true;
	}*/

	// Si un titre exact de film a été renseigné ou si on n'a qu'un seul résultat lors de la recherche
	if (isset($_GET['yelpExact']) || sizeof($yelpResultsList) == 1) {
		// On vide le tableau de résultats de la recherche
		$yelpResultsList = array();
		try {
			// On récupère les infos sur un seul film
			/**!!???????**/$buisness = \Jleagle\yelp\yelp::retrieve($yelp);
			
			// On donne les bonnes valeurs aux variables destinées à l'affichage
			// => pré-remplir le formulaire
			$nomBuisness = $buisness->title;
			$gpsLongBuisness = $buisness->long;
			$gpsLatBuisness = $buisness->lat;
			$codepostBuisness = $buisness->postal;
			$infosBuisness = $buisness->description;
			$photoBuisness = $buisness->photo;
			$villeBuisness = $buisness->ville;
			$adresseBuisness = $buisness->adress;
		}
		catch (Exception $e) {
		}
	}
}

// Récupère toutes les catégories pour générer le menu déroulant des catégories
// J'appelle ma fonction car j'ai factorisé comme un pro !


//$categoriesList = getAllCat();



// Récupère tous les supports pour générer le menu déroulant des supports


include '../html/header.html';

?>
<form action="" method="get">
		<legend>Pré-remplir avec Yelp</legend>
		<fieldset>
			<input type="text" name="yelp" value="<?php echo 'Yelp me'// $yelp;  on remplit le champ de recherche yelp par les termes actuellement recherchés ?>" />
			<input type="submit" value="Rechercher" />
			<?php
			// Si aucun résultat, j'affiche l'information
			if ($noYelpResult) {
				echo '&nbsp;&nbsp;<strong>Aucun résultat</strong>';
			}
			// Sinon si on a fait une recherche et qu'on a plusieurs résultats, on les affiche
			else if (sizeof($yelpResultsList) > 0) {
				echo '<br />Résultats :';
				foreach ($yelpResultsList as $curYelp) {
					echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?yelp='.urlencode($curMovie->title).'&yelpExact=1">'.$curMovie->title.'</a>';
				}
			}
			?>
			<br />
		</fieldset>
	</form>

	<form action="" method="post">
		<legend>Gestion de film</legend>
		<fieldset>
			<input type="hidden" name="idbuisness" value="<?php echo $currentId; ?>" />
			<table>
			<tr>
				<td>Nom :&nbsp;</td>
				<td><input type="text" name="nomBuisness" value="<?php echo $nomBuisness; ?>"/></td>
			</tr>
			<tr>
				<td>Type :&nbsp;</td>
				<td><input type="text" name="typeBuisness">
					
			</tr>
			<tr>
				<td>Adresse :&nbsp;</td>
				<td><input type="text" name="adresseBuisness" value="<?php echo $adresseBuisness; ?>"/>
					<option value="">choisissez</option>
				</td>
			</tr>
			<tr>
				<td>Code Postal :&nbsp;</td>
				<td><input type="text" name="codepostBuisness" value="<?php echo $codepostBuisness; ?>"/>
					</td>	
			</tr>
			<tr>
				<td>Ville :&nbsp;</td>
				<td><input type="text" name="villeBuisness" ><?php echo $villeBuisness; ?></textarea></td>
			</tr>
			<tr>
				<td>Description :&nbsp;</td>
				<td><textarea name="infosBuisness" rows="12" cols="100"><?php echo $infosBuisness; ?></textarea></td>
			</tr>
			<tr>
				<td>Image(s) Disponible(s)&nbsp;:&nbsp;</td>
				<td><input type="text" name="photoBuisness" value="<?php echo $photoBuisness; ?>"/></td>
			</tr>
			<tr>
				<td>Coordonnées Lattitude GPS :&nbsp;</td>
				<td><input type="text" name="gpsLatBuisness" value="<?php echo $gpsLatBuisness; ?>"/></td>
			</tr>
			<tr>
				<td>Coordonnées Longitude GPS :&nbsp;</td>
				<td><input type="text" name="gpsLongBuisness" value="<?php echo $gpsLongBuisness; ?>"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="<?php if ($currentId > 0) { echo 'Modifier'; } else { echo 'Ajouter'; } ?>"/></td>
			</tr>	
			</table>
		</fieldset>
	</form>	
<?php
include '../html/footer.html';

?>