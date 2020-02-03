<?php
 
 session_start();
 require_once('admin-check.php');
 require_once('database.php');


$maRequete = $db->prepare('INSERT INTO categories (name)
VALUE(:laCategory)' );

$maRequete->execute([
    'laCategory' =>$_POST['name']
]);



header('Location: category-admin.php');
  exit();

