<div>
    <h1>Inscription</h1>

    <form action="controller/Utilisateur/UtilisateurController.php" method="POST">

    <label>Nom</label>
    <input type="text" name="nom" required><br>

    <label>Prénom</label>
    <input type="text" name="prenom" required><br>

    <label>Email</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe</label>
    <input type="password" name="password" required><br>

    <input type="hidden" name="action" value="inscription"><br>
    <input type="submit" value="valider"><br>
    </form>
</div>