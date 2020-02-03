<?php
session_start();
if(isset($_SESSION['utilisateur'])){
    unset($_SESSION['utilisateur']); //Supprime $_SESSION ['utilisateur']
}

header('Location: index.php');
exit();