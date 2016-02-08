<?php
    // connexion dans la base de données
    try{
        $bdd = new PDO('mysql:host=192.168.210.78;dbname=tice', 'webforce3');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    $request = $bdd->query("SELECT email FROM members WHERE email = '$_POST[email]'");
    $membre = $request->fetch();


    if(!empty($_POST['name']) AND !empty($_POST['pass']) AND !empty($_POST['email'])){ // si les variables ne sont pas vides
    
        if(($_POST['email']==$membre['email'])){
            echo "Exist"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
        }
        else{
            $name = mysql_real_escape_string($_POST['pseudo']);
            $pass = mysql_real_escape_string($_POST['pass']);
            $email = mysql_real_escape_string($_POST['email']);

            // puis on entre les données en base de données :
            $insertion = $bdd->prepare('INSERT INTO members VALUES("", :name, :pass, :email)');
            $insertion->execute(array(
                'name' => $name,
                'pass' => $pass,
                'email' => $email
            ));
            echo "Success"; //On 'retourne' la valeur Succes au javascript si la connexion est bonne
        }

    }
    else{
        echo "Error"; //On 'retourne' la valeur Error au javascript si la connexion n'est pas bonne
    }

?>