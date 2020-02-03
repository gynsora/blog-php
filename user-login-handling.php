<?php
 session_start();
 require_once('database.php');

 if(

    isset($_POST['pseudo'])
     && isset($_POST['motdepasse'])
     && $_POST['pseudo'] !==''
     && $_POST['motdepasse'] !==''
 ){

    // Verifier si le pseudo existe en base de données
    $maRequete = $db->prepare('SELECT * FROM users WHERE username = :boitePseudo');
    $maRequete->execute([
        "boitePseudo" => $_POST['pseudo']
    ]);
    $user = $maRequete->fetch();
    var_dump(password_verify($_POST['motdepasse'], $user['password']));
    die();

    if($user && password_verify($_POST['motdepasse'], $user['password'])){
        //L'utilisateur s'est bien authentifié

        $_SESSION['utilisateur'] = $user;
        
            header('Location: index.php');
            exit();

    }else{
        //Les identifiants sont invalides

    }
    


 }