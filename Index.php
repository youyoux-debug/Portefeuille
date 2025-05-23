<?php
session_start();

include('view/commun/Header.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'accueil' ;

switch ($page) {
    case 'accueil':
            include('view/accueil.php');
        break;
    case 'login':
            include('view/login.php');
        break;
    case 'inscription':
            include('view/inscription.php');
        break;
    case 'profil':
            include('view/profil.php');
        break;
    case 'portefeuille':
            include('view/portefeuille/Portefeuille.php');
        break;
    case 'depense':
            include('view/depense/Depense.php');
        break;
    case 'deconnexion':
        session_destroy();
        header('Location:http://127.0.0.1/Portefeuille/');
        exit();
        break;
    
    default:
        include('view/accueil.php');
        break;
}
include('view/commun/Footer.php');
?>