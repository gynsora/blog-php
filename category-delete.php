<?php
session_start();

require_once('admin-check.php');
require_once('database.php');

$maRequete = $db->prepare("DELETE FROM categories WHERE id = :boiteId ");
$maRequete->execute ([
    "boiteId" => $_GET["idDeCategorie"]
    

]);

header('Location: category-admin.php');
  exit();