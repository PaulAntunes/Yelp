<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.210.77;dbname=yelp', 'yelp', '123');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = $bdd->query("SELECT mailUtilisateur, mdpUtilisateur, idUtilisateur FROM utilisateur WHERE emailConnect = '$_POST[mailUtilisateur]' AND passConnect = '$_POST[mdpUtilisateur]'");
    $membre = $request->fetch();

    if(($_POST['emailConnect']==$membre['mailUtilisateur'])&&($_POST['passConnect']==$membre['mdpUtilisateur']))
    {
        echo "OK"; 
    }
    else 
    {
        echo "KO"; 
    }
?>