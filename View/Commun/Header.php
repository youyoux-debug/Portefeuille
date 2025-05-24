<!DOCTYPE html>
<html>
<head>
        <title>projet Portfeuille</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Stellar</h1>
					</header>
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php?page=accueil">Accueil</a></li>
							<li><a href="index.php?page=portefeuille">Compte</a></li>
							<li><a href="index.php?page=depense">Dépense</a></li>
							        <?php
                        if (isset($_SESSION['user'])) {
                                    ?>
                            <li><a href="index.php?page=profil">Profil</a></li>
                            <li><a href="index.php?page=deconnexion">Déconnexion</a></li>
                                    <?php
                                }
                                    ?>
                            <li><a href="index.php?page=inscription">Inscription</a></li>
                            <li><a href="index.php?page=login">Login</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">