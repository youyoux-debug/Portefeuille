<div>
    <h1>Page de Profil</h1>

<?php
    if (isset($_SESSION['user'])) {
?>
    <h2>Nom : <?php echo $_SESSION['user']['Nom']; ?></h2>
    <h2>Prénom : <?php echo $_SESSION['user']['Prenom']; ?></h2>
    <h2>
        <?php echo $_SESSION['user']['Email']; ?> 
    </h2>
<?php
    }
?>

</div>

<?php
include('Controller/Utilisateur/UtilisateurController.php');
include('Controller/Utilisateur/SelectUtilisateurs.php')
?>
<h1>Page Liste utilisateurs</h1>

<div class="table-responsive w-50 mx-auto">
        <table class="table table-primary table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($utilisateurs as $utilisateur){ ?>
                    <tr>
                        <td><?php echo $utilisateur['id']; ?></td>
                        <td><?php echo $utilisateur['nom']; ?></td>
                        <td><?php echo $utilisateur['prenom']; ?></td>
                        <td><?php echo $utilisateur['email']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>