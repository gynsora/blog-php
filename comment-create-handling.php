<?php
session_start();

if (!isset($_SESSION['utilisateur'])){
    header('Location:user-login.php');
    exit();
}

require_once('database.php');

//$_POST['contenu'] : le commentaire écrit par l'utilisateur
//$_SESSION['utilisateur']['id] : l'id de l'utilisateur connecté
//$_GET['articleId'] : l'id de l'article pour lequel le commentaire est posté

if(
    isset($_POST['contenu'])
    && $_POST['contenu'] !==''
    && strlen($_POST['contenu']) < 10000
){

    $maRequete = $db->prepare('INSERT INTO comments (content, published_at, user_id, article_id)
        VALUE(:boiteContenu, NOW(), :boiteUserId, :boiteArticleId)');
    $maRequete->execute([
        'boiteContenu' => $_POST['contenu'],
        'boiteArticleId'=> $_GET['idDeArticle'],
        'boiteUserId'=> $_SESSION['utilisateur']['id'],
    ]);
   
}

header('Location:article-single.php?idDeArticle=' . $_GET['idDeArticle']);
exit();

