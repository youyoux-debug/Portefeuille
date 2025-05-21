<?php

include("Model/UtilisateurModel.php");
include("bdd/bdd.php");

$UtilisateurModel = new Utilisateur($bdd);
$Utilisateurs = $UtilisateurModel->listeUtilisatuers();


?>