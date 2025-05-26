<?php
require_once('Model/Depense.php');

class DepenseController {
    private $depenseModel;

    public function __construct($bdd) {
        $this->depenseModel = new Depense($bdd);
    }

    public function ajouter($montant, $libelle, $date, $moyendepaie) {
        if ($this->depenseModel->ajouterDepense($montant, $libelle, $date, $moyendepaie)) {
            header('Location: index.php?page=depense');
            exit();
        } else {
            echo "Erreur lors de l'ajout de la dépense.";
        }
    }

    public function modifier($id, $montant, $libelle, $date, $moyendepaie) {
        if ($this->depenseModel->modifierDepense($id, $montant, $libelle, $date, $moyendepaie)) {
            header('Location: index.php?page=depense');
            exit();
        } else {
            echo "Erreur lors de la modification de la dépense.";
        }
    }

    public function supprimer($id) {
        if ($this->depenseModel->supprimerDepense($id)) {
            header('Location: index.php?page=depense');
            exit();
        } else {
            echo "Erreur lors de la suppression de la dépense.";
        }
    }

    public function afficherListe() {
        return $this->depenseModel->listeDepenses();
    }

    public function afficher($id) {
        return $this->depenseModel->lireDepense($id);
    }
}