<?php

include("Model/UtilisateurModel.php");
include("bdd/bdd.php");

if(isset($_POST['action'])){

    $UtilisateurController = new UtilisateurController($bdd);

    switch($_POST['action']){
        case 'inscription':
            $UtilisateurController->create();
            break;
        case 'login':
            $UtilisateurController->login();
            break;
        default:
            break;
    }
}

class UtilisateurController{

    private $Utilisateur;

    function __construct($bdd)
    {
        $this->Utilisateur = new Utilisateur($bdd);
    }

    public function create(){

        $this->Utilisateur->ajouterUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
        header('Location:http:/127.0.0.1/portefeuille');
    }

    public function login(){

        $user =$this->Utilisateur->checkLogin($_POST['email'], $_POST['password']);
        
        if($user){
            session_start();
            $_SESSION['user'] = $user;

            header('Location:http:/127.0.0.1/portefeuille');
        }
    }
}
?>