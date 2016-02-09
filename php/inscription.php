<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.201.77;dbname=yelp', '');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = $bdd->query("SELECT mailUtilisateur FROM utilisateur WHERE mailUtilisateur = '$_POST[emailRegister]'");
    $membre = $request->fetch();


    if(!empty($_POST['firstNameRegister']) AND   if(!empty($_POST['lastNameRegister']) AND !empty($_POST['passRegister']) AND !empty($_POST['emailRegister'])){ // si les variables ne sont pas vides
    
        if(($_POST['mailUtilisateur']==$membre['mailUtilisateur'])){
            echo "Exist"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
        }
        else{
            $firstName = mysql_real_escape_string($_POST['firstNameRegister']);
            $lastName = mysql_real_escape_string($_POST['lastNameRegister']);
            $pass = mysql_real_escape_string($_POST['passRegister']);
            $email = mysql_real_escape_string($_POST['emailRegister']);

            // puis on entre les données en base de données :
            $insertion = $bdd->exec('INSERT INTO utilisateur VALUES( mailUtilisateur, :prénomUtilisateur, :nomUtilisateur, :mdpUtilisateur) ');
            $insertion->bindvalue(':emailRegister',$email, PDO::PARAM_INT);
            $insertion->bindvalue(':firstNameRegister',$firstName, PDO::PARAM_INT);    
            $insertion->bindvalue(':lastNameRegister',$lastName, PDO::PARAM_INT);   
            $insertion->bindvalue(':passRegister',$pass, PDO::PARAM_INT);  
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