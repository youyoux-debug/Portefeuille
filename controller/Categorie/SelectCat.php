<?php

include("../../bdd/bdd.php");
include("../../Model/CategorieModel.php");

$CategorieModel = new Categorie($bdd);
$categories = $CategorieModel->listeCategories();

?>