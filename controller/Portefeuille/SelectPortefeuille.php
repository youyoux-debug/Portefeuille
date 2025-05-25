<?php

include("../../bdd/bdd.php");
include("../Portefeuille/Model/PortefeuilleModel.php");

$PortefeuilleModel = new Portefeuille($bdd);
$porteuille = $PortefeuilleModel->listePortefeuilles();

?>