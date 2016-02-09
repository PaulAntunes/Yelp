<?php
require '../html/index.html';
    
    // connexion dans la base de données
try{
    print_r($_GET);
  $bdd = new PDO('mysql:host=192.168.210.77;dbname=yelp', 'yelp', '123');
  }
  catch(Exeption $e){
    print_r($e);
  }
  
 
    $request = $bdd->query("SELECT mailUtilisateur FROM utilisateur WHERE mailUtilisateur = $_GET[emailRegister]");
    $membre = $request->fetch();


    if(!empty($_GET['firstName']) &&   !empty($_GET['lastName']) && !empty($_GET['pass']) && !empty($_GET['email'])){ // si les variables ne sont pas vides
    
        if(($_GET['emailRegister']==$membre['mailUtilisateur'])){
            echo "Exist"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
        }
        else{
            $firstNameRegister = mysql_real_escape_string($_GET['firstNameRegister']);
            $lastNameRegister = mysql_real_escape_string($_GET['lastNameRegister']);
            $passRegister = mysql_real_escape_string($_GET['passRegister']);
            $emailRegister = mysql_real_escape_string($_GET['emailRegister']);
           

            // puis on entre les données en base de données :
            $insertion = $bdd->exec('INSERT INTO utilisateur VALUES( mailUtilisateur, prénomUtilisateur, nomUtilisateur, mdpUtilisateur)');
            $insertion->bindvalue('mailUtilisateur',$emailRegister, PDO::PARAM_INT);
            $insertion->bindvalue('prénomUtilisateur',$firstNameRegister, PDO::PARAM_INT);    
            $insertion->bindvalue('nomUtilisateur',$lastNameRegister, PDO::PARAM_INT);   
            $insertion->bindvalue('mdpUtilisateur',$passRegister, PDO::PARAM_INT);  
            $insertion->execute();
            echo "Success"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
        }

    }
    else{
        echo "Error"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }


?>