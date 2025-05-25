<div>
    <h1>Connecter</h1>

    <form action="controller/Utilisateur/UtilisateurController.php" method="POST">

        <label>Email</label>
        <input type="email" name="email"><br>

        <label>Mot de passe</label>
        <input type="password" name="password"><br>

        <input type="hidden" name="action" value="login"><br>
        <input type="submit" value="valider"><br>
    </form>
</div>