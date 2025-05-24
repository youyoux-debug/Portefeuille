<?php
class Depense {
    private $bdd;

    function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function ajouterDepense($montant, $libelle, $date, $moyendepaie) {
        $req = $this->bdd->prepare("INSERT INTO depense(montant, libelle, date, moyendepaie) VALUES (:montant, :libelle, :date, :moyendepaie)");
        $req->bindParam(':montant', $montant);
        $req->bindParam(':libelle', $libelle);
        $req->bindParam(':date', $date);
        $req->bindParam(':moyendepaie', $moyendepaie);
        return $req->execute();
    }

    public function lireDepense($id) {
        $req = $this->bdd->prepare("SELECT * FROM depense WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch();
    }

    public function modifierDepense($id, $montant, $libelle, $date, $moyendepaie) {
        $req = $this->bdd->prepare("UPDATE depense SET montant=:montant, libelle=:libelle, date=:date, moyendepaie=:moyendepaie WHERE id=:id");
        $req->bindParam(':montant', $montant);
        $req->bindParam(':libelle', $libelle);
        $req->bindParam(':date', $date);
        $req->bindParam(':moyendepaie', $moyendepaie);
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function supprimerDepense($id) {
        $req = $this->bdd->prepare("DELETE FROM depense WHERE id = :id");
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function listeDepenses() {
        $req = $this->bdd->prepare("SELECT * FROM depense");
        $req->execute();
        return $req->fetchAll();
    }
}
?>
