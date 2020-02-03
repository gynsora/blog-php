<?php include("header.php");

require_once('admin-check.php');
 
require_once('database.php');

$maRequete = $db->prepare('SELECT categories.id, categories.name
FROM categories 
 ');


$maRequete->execute();
$categories = $maRequete->fetchAll();


?>

<h1>Liste des categories</h1>

<h2>Nouvelle categorie</h2>
<a href="category-create.php" class="site-navigation-link"> Créer une nouvelle categorie</a>


<table class="tableau">
    <tr>
        <th> Id  </th>
        <th> Name  </th>
        <th colspan='2'> Edit </th>
    </tr> 

    <?php foreach($categories as $categorie):?>

    <tr>
        <td> <?php echo $categorie["id"]; ?> </td>
        <td> <?php echo $categorie["name"]; ?> </td>
        <td> <a href="category-edit.php?idDeCategorie=<?php echo $categorie["id"];?>" class="site-navigation-link"> Modifier </a></td>
        <td> <a href="category-delete.php?idDeCategorie=<?php echo $categorie["id"];?>" class="site-navigation-link"> Supprimer </a></td>
        
     </tr>
    <?php   endforeach ?>
        
        
     
     </table>