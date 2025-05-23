<!DOCTYPE html>
<html>
<head>

    <title>projet Portfeuille</title>

</head>
<body>
    <a href="index.php?page=accueil">Accueil</a>
    <a href="index.php?page=portefeuille">Compte</a>
    <a href="index.php?page=depense">Liste des Dépenses</a>
    <?php
    if (isset($_SESSION['user'])) {
?>
    <a href="index.php?page=profil">profil</a>
    <a href="index.php?page=deconnexion">Déconnexion</a>
<?php
    }
?>
    <a href="index.php?page=inscription">Inscription</a>
    <a href="index.php?page=login">Login</a>
