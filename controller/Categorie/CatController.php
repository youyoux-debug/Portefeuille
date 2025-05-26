<?php
require_once('Model/Categorie.php');

class CategorieController {
    private $categorieModel;

    public function __construct($bdd) {
        $this->categorieModel = new Categorie($bdd);
    }

    public function ajouter($libelle) {
        if ($this->categorieModel->ajouterCategorie($libelle)) {
            header('Location: index.php?page=categories');
            exit();
        } else {
            echo "Erreur lors de l'ajout de la catégorie.";
        }
    }

    public function modifier($id, $libelle) {
        if ($this->categorieModel->modifierCategorie($id, $libelle)) {
            header('Location: index.php?page=categories');
            exit();
        } else {
            echo "Erreur lors de la modification.";
        }
    }

    public function supprimer($id) {
        if ($this->categorieModel->supprimerCategorie($id)) {
            header('Location: index.php?page=categories');
            exit();
        } else {
            echo "Erreur lors de la suppression.";
        }
    }

    public function afficherListe() {
        return $this->categorieModel->listeCategories();
    }

    public function afficher($id) {
        return $this->categorieModel->lireCategorie($id);
    }
}
