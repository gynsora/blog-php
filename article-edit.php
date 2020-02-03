<?php include("header.php");
require_once('admin-check.php');
require_once('database.php'); 

$maRequete = $db->prepare('SELECT id, title, content,image_path FROM articles WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idDeArticle"]
]);
$article = $maRequete->fetch();

$maRequeteCategorie = $db->prepare('SELECT * FROM categories');
$maRequeteCategorie->execute();
$categories = $maRequeteCategorie->fetchAll();
?>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php  if(!empty($article["image_path"])): ?>
    <div class="postImageContainer">            
        <img src ="<?php echo $article["image_path"] ?>" class="imagePost" />           
    </div>
<?php endif ; ?>

<form action="article-edit-handling.php?idDeArticle=<?php echo $article['id']; ?>" method="POST" enctype="multipart/form-data">
   
    <label>
        <div>Titre</div>
        <input type="text" name="titre" maxlength="255" required value="<?php echo $article["title"]; ?>">
    </label>    
    <label>
        <div>Description</div>
        <textarea name="contenu"  ><?php echo $article["content"]; ?></textarea> 
    </label>
    <label>
        <div class="comments"><h2>Catégories</h2> </div>
        <select class='option' name='categorie_ids[]' multiple> 

        <?php foreach($categories as $categorie):?>        
        <option value ='<?php echo $categorie["id"] ?>'> <?php echo $categorie["name"]; ?> </option>        
        <?php   endforeach ?>

        </select>
    </label>
    <label >
        <div>Image</div> 
        <input type="file" name="image"> 
    </label>  
    <div>
        <button>Valider</button>
    </div>


</form>

<?php include("footer.php");?>