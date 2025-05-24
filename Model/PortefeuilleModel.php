<?php
class Portefeuille {
    private $bdd;

    function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function ajouterPortefeuille($montant, $depense_id, $categorie_id, $date) {
        $req = $this->bdd->prepare("INSERT INTO portefeuille(montant, depense_id, categorie_id, date) VALUES (:montant, :depense_id, :categorie_id, :date)");
        $req->bindParam(':montant', $montant);
        $req->bindParam(':depense_id', $depense_id);
        $req->bindParam(':categorie_id', $categorie_id);
        $req->bindParam(':date', $date);
        return $req->execute();
    }

    public function lirePortefeuille($id) {
        $req = $this->bdd->prepare("SELECT * FROM portefeuille WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch();
    }

    public function modifierPortefeuille($id, $montant, $depense_id, $categorie_id, $date) {
        $req = $this->bdd->prepare("UPDATE portefeuille SET montant=:montant, depense_id=:depense_id, categorie_id=:categorie_id, date=:date WHERE id=:id");
        $req->bindParam(':montant', $montant);
        $req->bindParam(':depense_id', $depense_id);
        $req->bindParam(':categorie_id', $categorie_id);
        $req->bindParam(':date', $date);
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function supprimerPortefeuille($id) {
        $req = $this->bdd->prepare("DELETE FROM portefeuille WHERE id = :id");
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function listePortefeuilles() {
        $req = $this->bdd->prepare("SELECT * FROM portefeuille");
        $req->execute();
        return $req->fetchAll();
    }
}
?>