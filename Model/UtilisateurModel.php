<?php

class Utilisateur{

    private $bdd;

    function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterUtilisateur($nom, $prenom, $email, $mdp){

        $hashpassword = sha1($mdp);
        $req = $this->bdd->prepare("INSERT INTO Utilisateur(Nom, Prenom, Email, Mdp) VALUES (:nom, :prenom, :email, :mdp");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':email', $email);
        $req->bindParam(':mdp', $hashpassword);

        return $req->execute();
    }

    public function checkLogin($email, $password){

        $hashMdp = sha1($password);

        $req = $this->bdd->prepare("SELECT * FROM Utilisateur WHERE Email=:email AND Mdp=:mdp");
        $req->bindParam(':email', $email);
        $req->bindParam(':mdp', $hashMdp);

        $req->execute();

        return $req->fetch();
    }

    public function listeUtilisateurs(){

        $req = $this->bdd->prepare("SELECT * FROM Utilisateur");

        $req->execute();
        
        return $req->fetchall();
    }
}


?>