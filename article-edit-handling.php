<?php

//$_POST : contient les valeurs de tous les champs du formulaire
//$_POST['titre'] : contient la valeur du champ qui a pour name 'titre'
//$_POST['contenu'] : contient la valeur du champ qui a pour name 'contenu'
session_start();
require_once('admin-check.php');
require_once('database.php');


var_dump($_POST['titre']);
var_dump($_POST['contenu']);


if(
    isset($_POST['titre'])
    && isset($_POST['contenu'])
    && $_POST['titre'] !== ''
    && $_POST['contenu'] !== ''
    && strlen ($_POST['titre']) < 255
){
    echo "les données sont valides";
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
    if($cheminVersLimage){
        //l'utilisateur veut changer l'image assoiée à l'article
        $maRequete = $db->prepare('UPDATE articles SET title = :boiteTitre, content = :boiteContenu ,image_path = :boiteImagePath WHERE id = :boiteId');
        $maRequete->execute([
            "boiteTitre" => $_POST['titre'],
            "boiteContenu" => $_POST['contenu'],
            "boiteId" => $_GET['idDeArticle'],
            "boiteImagePath" => $cheminVersLimage
        ]);
    }else{
        //l'utilisateur ne veut pas changer l'image associée à l'article
        $maRequete = $db->prepare('UPDATE articles SET title = :boiteTitre, content = :boiteContenu WHERE id = :boiteId');
        $maRequete->execute([
            "boiteTitre" => $_POST['titre'],
            "boiteContenu" => $_POST['contenu'],
            "boiteId" => $_GET['idDeArticle']
        ]);
    }

     
     /*supprimer de la table articles_categories toutes les lignes qui correpsondent à l'article que l'on est en train de 
     modifier (on enleve les anciennes associations article/categorie)
     */
    $requeteSupprCategorie = $db->prepare('DELETE FROM articles_categories WHERE article_id = :boiteId');
    $requeteSupprCategorie->execute([
        "boiteId" => $_GET['idDeArticle']
    ]);
     /*
     pour chaque catégorie sélectionnée, ajouter un ligne dans articles_categories (on asocie l'article aux catégories
     sélectionnées par l'utilisateur)
     */
    foreach($_POST['categorie_ids'] as $categorieId):
        $requeteCategory = $db->prepare('INSERT INTO articles_categories (article_id, category_id) 
        VALUE(:laBoiteArticleId, :laBoiteCategoryId )');
        $requeteCategory->execute([
            "laBoiteArticleId" => $_GET['idDeArticle'],
            "laBoiteCategoryId" => $categorieId
        ]);
        
    endforeach;

}else {
    echo "les données sont invalides";
}


header('Location: article-admin.php');
exit();      
