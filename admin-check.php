<?php
if(
     !isset($_SESSION['utilisateur'])                        // s'il n'est pas connecté
     || $_SESSION['utilisateur']['role'] !== 'admin'    //ou alors (il est connecté mais) son role n'est pas admin
 ){
     header('Location: index.php');
    exit();
 }
 