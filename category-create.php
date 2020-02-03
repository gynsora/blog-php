<?php include("header.php");
require_once('admin-check.php');?>



<form action="category-create-handling.php" method="POST">

<h1>Nouvelle catégorie : </h1>


    <label>
        <div class="comments"></div>
        <input class="text" type="text" name="name" maxlength="255" required>
    </label>

   
    <div class="submit">
        <button class="valid">Valider</button>
    </div>
    
   
</form>


    <?php include("footer.php");?>