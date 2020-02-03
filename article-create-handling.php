<?php
 //Se connecter a la base de données avec les bons identifiants
 session_start();
 require_once('admin-check.php');
 require_once('database.php');
 
 //var_dump($_POST);
 

if(
    isset($_POST['titre'])
    && isset($_POST['contenu'])
    && $_POST['titre'] !== ''
    && $_POST['contenu'] !== ''
    && strlen ($_POST['titre']) < 255
){
    echo "Les données sont valides";
    /**
     * STOCKAGE DES DONNES EN BASE
     */
    if(isset($_FILES['image'])){
        if(getimagesize($_FILES['image']['tmp_name'])){
            $cheminVersLimage = "images/".basename($_FILES['image']['name']);
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $cheminVersLimage
            );
        }
    }

    $maRequete = $db->prepare('INSERT INTO articles (title, content, published_at,image_path) 
    VALUE(:leTitre, :leContenu, NOW(),:laBoiteImagePath)');
    $maRequete->execute([
        "leTitre" => $_POST['titre'],
        "leContenu" => $_POST['contenu'],        
        "laBoiteImagePath" => $cheminVersLimage
    ]);
    // pour chaque id qui se trouvent ds $_POST[categorie_ids] il faut faire un INSERT INTO de la table articles_categories.

    $lastId=$db->lastInsertId();

    foreach($_POST['categorie_ids'] as $categorie):
        $requeteCategory = $db->prepare('INSERT INTO articles_categories (article_id, category_id,image_path) 
        VALUE(:laBoiteArticleId, :laBoiteCategoryId )');
        $requeteCategory->execute([
            "laBoiteArticleId" =>$lastId,
            "laBoiteCategoryId" => $categorie
        ]);
        
    endforeach;

   

}else {
    echo "Les données sont invalides";
}



  header('Location: article-admin.php');
  exit();      

