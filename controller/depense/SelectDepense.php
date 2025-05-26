<?php

include("../../bdd/bdd.php");
include("../../Model/DepenseModel.php");

$DepenseModel = new Depense($bdd);
$depenses = $DepenseModel->listeDepenses();

?>