<?php
session_start();
require_once('admin-check.php');
require_once('database.php');
if(
    isset($_POST['contenu'])
    && $_POST['contenu'] !== ''
){

     $maRequete = $db->prepare('UPDATE categories SET  name = :boiteContenu WHERE id = :boiteId');
     $maRequete->execute([
         "boiteContenu" => $_POST['contenu'],
         "boiteId" => $_GET['idDeCategory']
     ]);

     $resultat =  $maRequete ;
     

}else {
    echo "les donées sont invalides";
}


  header('Location: category-admin.php');
  exit();      
