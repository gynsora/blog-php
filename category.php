<?php include("header.php");
require_once('database.php'); 

// Requete de récupération de l'article
$maRequete = $db->prepare('SELECT articles.title, articles.id, articles.content , articles.published_at 
FROM articles
JOIN articles_categories 
ON articles.id = articles_categories.article_id
WHERE category_id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idDeCategory"]
]);
$articles = $maRequete->fetchAll();

$categories = $db->prepare('SELECT name FROM categories WHERE id = :boiteId');
$categories->execute([
    "boiteId" => $_GET["idDeCategory"]
]);
$categorySelected = $categories->fetch();
?>

<h1>Liste de tous les articles avec la categorie <?php echo $categorySelected['name'] ?></h1>

<?php foreach($articles as $article):?>
<article class="post"> 
    <h2 class="titreArticle">
        <a class="lienArticle" href="article-single.php?idDeArticle=<?php echo $article["id"]; ?>">
            <?php echo $article["title"]; ?> 
        </a>
    </h2>
    <p><?php echo $article["content"]; ?> </p>
    <p><?php echo $article["published_at"];?> </p>    
    <a href="article-single.php?idDeArticle=<?php echo  $article["id"]; ?>">voir commentaire</a>
</article>
<?php   endforeach ?>
    
<?php include("footer.php");?>