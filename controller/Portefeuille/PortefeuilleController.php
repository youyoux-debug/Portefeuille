<?php
require_once('/Model/Portefeuille.php');

class PortefeuilleController {
    private $portefeuilleModel;

    public function __construct($bdd) {
        $this->portefeuilleModel = new Portefeuille($bdd);
    }

    public function ajouter($montant, $depense_id, $categorie_id, $date) {
        if ($this->portefeuilleModel->ajouterPortefeuille($montant, $depense_id, $categorie_id, $date)) {
            header('Location: index.php?page=portefeuille');
            exit();
        } else {
            echo "Erreur lors de l'ajout dans le portefeuille.";
        }
    }

    public function modifier($id, $montant, $depense_id, $categorie_id, $date) {
        if ($this->portefeuilleModel->modifierPortefeuille($id, $montant, $depense_id, $categorie_id, $date)) {
            header('Location: index.php?page=portefeuille');
            exit();
        } else {
            echo "Erreur lors de la modification du portefeuille.";
        }
    }

    public function supprimer($id) {
        if ($this->portefeuilleModel->supprimerPortefeuille($id)) {
            header('Location: index.php?page=portefeuille');
            exit();
        } else {
            echo "Erreur lors de la suppression du portefeuille.";
        }
    }

    public function afficherListe() {
        return $this->portefeuilleModel->listePortefeuilles();
    }

    public function afficher($id) {
        return $this->portefeuilleModel->lirePortefeuille($id);
    }
}
