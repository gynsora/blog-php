<?php
try{
    $db = new PDO ('mysql:dbname=blog;host=localhost','root','');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch (PDOException $error){
     echo "Une erreur est survenue. Veuillez réessayer plus tard.";
}
