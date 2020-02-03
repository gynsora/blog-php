<?php include("header.php");
require_once('database.php');

$maRequete = $db->prepare('SELECT *FROM articles ORDER BY published_at DESC LIMIT 1');
$maRequete->execute();
$article = $maRequete->fetch();
?>

<?php if(isset($_SESSION['utilisateur'])): ?>
    <h1 class="welcome">Bienvenue : <?php echo $_SESSION['utilisateur']['username'];?></h1>
<?php endif;?>

    <article class="container">
        <h1>Titre du dernier article</h1>
        <p> Contenu de l'article</p>
    </article>


    <article class="post"> 
        <h2 class="titreArticle"><?php echo $article["title"]; ?> </h2>
        <?php  if(!empty($article["image_path"])): ?>
        <div class="postImageContainer">            
            <img src ="<?php echo $article["image_path"] ?>" class="imagePost" />           
        </div>
        <?php endif ; ?>
        <p><?php echo $article["content"]; ?> </p>
        <p><?php echo $article["published_at"];?> </p>
        <a href="article-single.php?idDeArticle=<?php echo  $article["id"]; ?>">voir commentaire</a>
    </article>


    
 <?php include("footer.php");?>
