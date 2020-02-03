<?php include("header.php");

require_once('admin-check.php');
 


require_once('database.php');


$maRequete = $db->prepare('SELECT comments.content, users.username, articles.title, comments.published_at
FROM comments 
INNER JOIN articles ON articles.id = comments.article_id
INNER JOIN users ON comments.user_id = users.id
ORDER BY comments.published_at DESC ');


$maRequete->execute();
$comments = $maRequete->fetchAll();

?>

<h1>Liste de tous les commentaires</h1>

<table class="tableau">
    <tr>
        <th> Commentaires  </th>
        <th> Usernames  </th>
        <th> titre article</th>
        <th> Dates </th>
     </tr>
     <?php foreach($comments as $comment):?>
        <tr>
        <td> <?php echo $comment["content"]; ?> </td>
        <td> <?php echo $comment["username"]; ?> </td>
        <td> <?php echo $comment["title"];?> </td>
        <td> <?php echo $comment["published_at"];?> </td>
       
    </tr>
    <?php   endforeach ?>
    </table>





<?php include("footer.php");?>