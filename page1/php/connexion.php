<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.210.78;dbname=tice', 'webforce3');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = $bdd->query("SELECT email, pass, ID FROM members WHERE email = '$_POST[emailConnect]' AND pass = '$_POST[passConnect]'");
    $membre = $request->fetch();

    if(($_POST['emailConnect']==$membre['email'])&&($_POST['passConnect']==$membre['pass']))
    {
        echo "OK"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
    }
    else 
    {
        echo "KO"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }
?>