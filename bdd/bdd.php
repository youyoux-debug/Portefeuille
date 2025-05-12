<?php 

try{

	$user = "root";
	$pass = "";
	$bdd = new PDO('mysql:host=localhost;dbname=portefeuille', $user, $pass);

}catch(PDOException $e){
	print "Erreur! :" .$e->getMessage() .
	"<br/>";
	die();
}

?>