<?php include("header.php");?>

<h1>Veuillez vous inscrire</h1>

<form action="user-register-handling.php" method="POST">
    <label>
        <div>Pseudo</div>
        <input  type="text" name="pseudo" maxlength="30" required>
    </label>

    <label>
        <div>Mot de passe</div>
        <input type="password" name="motdepasse" maxlength="255" required>
    </label>
    <label>
        <div>Confirmation de mot de passe</div>
        <input type="password" name="motdepasse-confirmation" maxlength="255" required> 
    </label>
   
    <div>
        <button>S'inscrire</button>
    </div>
    
   
</form>

<?php include("footer.php");?>
