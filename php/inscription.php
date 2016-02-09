<?php
    // connexion dans la base de données
  $bdd = new PDO('mysql:host=192.168.201.77;dbname=yelp', '');
 
    $request = $bdd->query("SELECT mailUtilisateur FROM utilisateur WHERE mailUtilisateur = $_POST[emailRegister]");
    $membre = $request->fetch();


    if(!empty($_POST['firstName']) AND   (!empty($_POST['lastName']) AND !empty($_POST['pass']) AND !empty($_POST['email'])){ // si les variables ne sont pas vides
    
        if(($_POST['emailRegister']==$membre['mailUtilisateur'])){
            echo "Exist"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
        }
        else{
            $firstNameRegister = mysql_real_escape_string($_POST['firstNameRegister']);
            $lastNameRegister = mysql_real_escape_string($_POST['lastNameRegister']);
            $passRegister = mysql_real_escape_string($_POST['passRegister']);
            $emailRegister = mysql_real_escape_string($_POST['emailRegister']);
            echo'123'

            // puis on entre les données en base de données :
            $insertion = $bdd->exec('INSERT INTO utilisateur VALUES( mailUtilisateur, prénomUtilisateur, nomUtilisateur, mdpUtilisateur)');
            $insertion->bindvalue('mailUtilisateur',$emailRegister, PDO::PARAM_INT);
            $insertion->bindvalue('prénomUtilisateur',$firstNameRegister, PDO::PARAM_INT);    
            $insertion->bindvalue('nomUtilisateur',$lastNameRegister, PDO::PARAM_INT);   
            $insertion->bindvalue('mdpUtilisateur',$passRegister, PDO::PARAM_INT);  
            $insertion->execute();
            ));
            echo "Success"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
        }

    }
    else{
        echo "Error"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }
}

?>