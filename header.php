<?php session_start(); ?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Peut être le meilleur blog du monde">
    <title>Mon Blog</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>


    <header class="site-header">
        <h1 class="title">Mon Blog . . .</h1>
    </header>
    <nav class="site-navigation">
        <a href="index.php" class="site-navigation-link">Accueil</a>
        <a href="article-all.php" class="site-navigation-link">Articles</a>
        <a href="contact.php" class="site-navigation-link">Contact</a>

        <?php if(isset($_SESSION['utilisateur'])): ?>
            <?php if ($_SESSION['utilisateur']['role']=== 'admin'): ?>
            <a href="article-admin.php" class="site-navigation-link">Gestion des articles</a>
            <a href="category-admin.php" class="site-navigation-link">Gestion des categories</a>
            <a href="comment-admin.php" class="site-navigation-link">Gestion des commentaires</a>
            <?php endif; ?>
            <a href="user-logout.php" class="site-navigation-link">Déconnexion</a>

        <?php else:?>

            <a href="user-login.php" class="site-navigation-link">Connexion</a>
            <a href="user-register.php" class="site-navigation-link">Inscription</a>
        <?php endif; ?>

    </nav>
    <div class="container">