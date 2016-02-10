<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.210.77;dbname=yelp', 'yelp', '123');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    $request = $bdd->query("SELECT mailUtilisateur FROM utilisateur WHERE mailUtilisateur = '$_POST[emailRegister]'");
    $membre = $request->fetch();
    if(!empty($_POST['firstNameRegister']) &&   if(!empty($_POST['lastNameRegister']) && !empty($_POST['passRegister']) && !empty($_POST['emailRegister'])){ // si les variables ne sont pas vides
    
        if(($_POST['mailUtilisateur']==$membre['mailUtilisateur'])){
            echo "Exist"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
        }
        else{
            $firstNameRegister = mysql_real_escape_string($_POST['firstNameRegister']);
            $lastNameRegister = mysql_real_escape_string($_POST['lastNameRegister']);
            $passRegister = mysql_real_escape_string($_POST['passRegister']);
            $emailRegister = mysql_real_escape_string($_POST['emailRegister']);
            // puis on entre les données en base de données :
            $insertion = $bdd->prepare('INSERT INTO utilisateur VALUES(mailUtilisateur, prénomUtilisateur, nomUtilisateur, mdpUtilisateur)');
            $insertion-> bindValue('mailUtilisateur', $emailRegister, PDO::PARAM_INT);
            $insertion-> bindValue('prénomUtilisateur', $firstNameRegister, PDO::PARAM_INT);
            $insertion-> bindValue('nomUtilisateur', $lastNameRegister, PDO::PARAM_INT);
            $insertion-> bindValue('mdpUtilisateur', $passRegister, PDO::PARAM_INT);
            $insertion-> execute();
            echo "Success"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
        }
        }
    }
    else{
        echo "Error"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }
?>