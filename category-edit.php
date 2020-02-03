<?php include("header.php");
require_once('admin-check.php');
require_once('database.php'); 

$maRequete = $db->prepare('SELECT id, name FROM categories WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idDeCategorie"]
]);
$categorie = $maRequete->fetch();
?>

<form action="category-edit-handling.php?idDeCategory=<?php echo $categorie['id']; ?>" method="POST">
   

    <label>
        <div>Categorie</div>
        <input type="text" name="contenu"  value="<?php echo $categorie['name']; ?>" required ></input> 
    </label>

    <div>
        <button>Enregistrer</button>
    </div>


</form>

<?php include("footer.php");?>