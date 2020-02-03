<?php include("header.php");

require_once('admin-check.php');
require_once('database.php');

$maRequete = $db->prepare('SELECT categories.name, categories.id
FROM categories 
 ');


$maRequete->execute();
$categories = $maRequete->fetchAll();


?>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>


<form action="article-create-handling.php" method="POST" enctype="multipart/form-data">
    <label>
        <div class="comments"><h2>Titre</h2></div>
        <input class="text" type="text" name="titre" maxlength="255" required>
    </label>

    <label>
        <div class="comments"><h2>Description</h2></div>
        <textarea class="contenu" name="contenu"></textarea> 
    </label>


    <div class="comments"><h2>Catégories</h2> </div>
    <select class='option' name='categorie_ids[]' multiple>
        <?php foreach($categories as $categorie):?>
        <option value ='<?php echo $categorie["id"] ?>'> <?php echo $categorie["name"]; ?> </option>       
        <?php   endforeach; ?>

    </select>

    <label for="">
        <div>Image</div> 
        <input type="file" name="image"> 
    </label>
   
    
    
    <div class="submit">
        <button class="valid">Valider</button>
    </div>
    
   
</form>


<?php include("footer.php");?>