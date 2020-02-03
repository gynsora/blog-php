<?php
session_start();

require_once('admin-check.php');
require_once('database.php');

$maRequete = $db->prepare("DELETE FROM articles WHERE id = :boiteId ");
$maRequete->execute ([
    "boiteId" => $_GET["idDeArticle"]
    

]);

header('Location: article-admin.php');
  exit();