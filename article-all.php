<?php include("header.php");

// Se connecter à la base de données, dans une variable  $db
require_once('database.php');

$maRequete = $db->prepare('SELECT *FROM articles ORDER BY published_at DESC');
$maRequete->execute();
$articles = $maRequete->fetchAll();


?>

<h1>Liste de tous les articles</h1>

<?php foreach($articles as $article):?>
<article class="post"> 
    <h2 class="titreArticle">
        <a class="lienArticle" href="article-single.php?idDeArticle=<?php echo $article["id"]; ?>">
            <?php echo $article["title"]; ?> 
        </a>
    </h2>
    <?php  if(!empty($article["image_path"])): ?>
        <div class="postImageContainer">            
            <img src ="<?php echo $article["image_path"] ?>" class="imagePost" />           
        </div>
    <?php endif ; ?>
    <p><?php echo $article["content"]; ?> </p>
    <p><?php echo $article["published_at"];?> </p>    
    <a href="article-single.php?idDeArticle=<?php echo  $article["id"]; ?>">voir commentaire</a>
</article>
<?php   endforeach ?>
    
<?php include("footer.php");?>
