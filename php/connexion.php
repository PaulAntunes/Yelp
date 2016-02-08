<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.201.77;dbname=yelp', 'webforce3');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = $bdd->query("SELECT mailUtilisateur, mdpUtilisateur, idUtilisateur FROM utilisateur WHERE emailConnect = '$_POST[mailUtilisateur]' AND passConnect = '$_POST[mdpUtilisateur]'");
    $membre = $request->fetch();

    if(($_POST['emailConnect']==$membre['mailUtilisateur'])&&($_POST['passConnect']==$membre['mdpUtilisateur']))
    {
        echo "OK"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
    }
    else 
    {
        echo "KO"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }
?>