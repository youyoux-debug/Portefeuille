<?php
class Categorie {
    private $bdd;

    function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function ajouterCategorie($libelle) {
        $req = $this->bdd->prepare("INSERT INTO categorie(libelle) VALUES (:libelle)");
        $req->bindParam(':libelle', $libelle);
        return $req->execute();
    }

    public function lireCategorie($id) {
        $req = $this->bdd->prepare("SELECT * FROM categorie WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch();
    }

    public function modifierCategorie($id, $libelle) {
        $req = $this->bdd->prepare("UPDATE categorie SET libelle=:libelle WHERE id=:id");
        $req->bindParam(':libelle', $libelle);
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function supprimerCategorie($id) {
        $req = $this->bdd->prepare("DELETE FROM categorie WHERE id = :id");
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function listeCategories() {
        $req = $this->bdd->prepare("SELECT * FROM categorie");
        $req->execute();
        return $req->fetchAll();
    }
}
?>