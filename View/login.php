<div>
    <h1>Connecter</h1>

    <form action="controller/Utilisateur/UtilisateurController.php" method="POST">

        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe</label>
        <input type="password" name="password" required><br>

        <input type="hidden" name="action" value="login" required><br>
        <input type="submit" value="valider"><br>
    </form>
</div>