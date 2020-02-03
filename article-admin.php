<?php include("header.php");

require_once('admin-check.php');
 

// Se connecter à la base de données, dans une variable  $db
require_once('database.php');


$maRequete = $db->prepare('SELECT *FROM articles ORDER BY published_at DESC');
$maRequete->execute();
$articles = $maRequete->fetchAll();


?>

<h1>Liste de tous les articles</h1>
<a href="article-create.php" class="site-navigation-link"> Créer un nouvel article</a>

<table class="tableau">
    <tr>
        <th> ID  </th>
        <th> TITRE  </th>
        <th> DATE DE PUBLICATION </th>
        <th colspan="2"> ACTIONS  </th>
    </tr>

    <?php foreach($articles as $article):?>

    <tr>
        <td> <?php echo $article["id"]; ?> </td>
        <td> <?php echo $article["title"]; ?> </td>
        <td> <?php echo $article["published_at"];?> </td>
        <td> <a href="article-edit.php?idDeArticle=<?php echo $article["id"];?>" class="site-navigation-link"> Modifier </a></td>
        <td> <a href="article-delete.php?idDeArticle=<?php echo $article["id"];?>" class="site-navigation-link"> Supprimer </a></td>
    </tr>

    <?php   endforeach ?>
        </table>


    

    
<?php include("footer.php");?>