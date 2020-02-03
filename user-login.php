<?php include("header.php");?>

<h1>Veuillez vous connecter</h1>

<form action="user-login-handling.php" method="POST">
    <label>
        <div>Pseudo</div>
        <input  type="text" name="pseudo"  required>
    </label>

    <label>
        <div>Mot de passe</div>
        <input type="password" name="motdepasse"  required>
    </label>
    <div>
        <button>Se connecter</button>
    </div>
    
   
</form>

<?php include("footer.php");?>