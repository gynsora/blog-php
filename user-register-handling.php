<?php
 
 require_once('database.php');

 if(
     isset($_POST['pseudo'])
     && isset($_POST['motdepasse'])
     && isset($_POST['motdepasse-confirmation'])
     && $_POST['pseudo'] !==''
     && $_POST['motdepasse'] !==''
     && $_POST['motdepasse-confirmation'] !== ''
     && $_POST['motdepasse'] === $_POST['motdepasse-confirmation']
     && strlen ($_POST['pseudo']) <= 30
     && strlen ($_POST['pseudo']) <= 255
 ){
     echo "Les données sont valides";

     $maRequete = $db->prepare('INSERT INTO users (username, password) 
     VALUE(:lePseudo, :leMotdepasse)');
     $insertion = $maRequete->execute([
         "lePseudo" => $_POST['pseudo'],
         "leMotdepasse" => password_hash($_POST['motdepasse'], PASSWORD_DEFAULT) 
        
     ]);
     if($insertion){
        header('Location: user-login.php');
        exit();
     }


 }else{
     "Les données sont invalides";
 }

header('Location: user-register.php');
exit();