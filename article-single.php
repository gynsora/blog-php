<?php include("header.php");
require_once('database.php'); 

// Requete de récupération de l'article
$maRequete = $db->prepare('SELECT * FROM articles WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idDeArticle"]
]);
$article = $maRequete->fetch();

// Requete de récupération des commentaires de l'article

$requeteComments = $db->prepare('SELECT comments.content, comments.published_at, users.username
FROM comments 
JOIN users ON comments.user_id = users.id
WHERE article_id = :boiteArticleId');
$requeteComments->execute([
    "boiteArticleId" => $_GET["idDeArticle"]
]);
    $comments = $requeteComments->fetchAll();
    
?>

<h1>Article </h1>
<article class="post"> 
<?php  if(!empty($article["image_path"])): ?>
    <div class="postImageContainer">            
        <img src ="<?php echo $article["image_path"] ?>" class="imagePost" />           
    </div>
<?php endif ; ?>
<h2 class="titreArticle"><?php echo $article["title"]; ?> </h2>
<p><?php echo $article["content"]; ?> </p>
</article>


<?php if(isset($_SESSION['utilisateur'])): ?> 
<form action="comment-create-handling.php?idDeArticle=<?php echo $article['id']; ?>" method="POST">
    <label>
        <div class="comments"><h2>Commentaire</h2></div>
        <textarea class="contenu" name="contenu" required ></textarea> 
    </label>

    <div class="submit">
        <button class="valid">Envoyer</button>
    </div>
</form>
<?php endif ; ?>
<?php foreach($comments as $comment):?>
    <article class="coms">
    <p class="user"><?php echo $comment["username"] ; ?></p>
    <p><?php echo htmlspecialchars($comment["content"]); ?> </p>
    <p class='dateTime'><?php echo $comment["published_at"];?> </p>
    </article>
<?php   endforeach ; ?>




<?php include("footer.php");?>