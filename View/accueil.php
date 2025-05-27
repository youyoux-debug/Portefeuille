

						<!-- Introduction -->
						 <?php
    						if (isset($_SESSION['user'])) {
						?>
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h1>Bienvenue
        										<?php echo $_SESSION['user']['Prenom']; ?> 
    										</h1>
										</header>
										<p>Voici votre espace auquel vous pouvez visionner votre compte bancaire.</p>
										<ul class="actions">
											<li><a href="index.php?page=portefeuille" class="button">Voir plus</a></li>
										</ul>
									</div>
									<span class="image"><img src="assets/img/logo Stellar.jpg" alt="" /></span>
								</div>
							</section>
							<?php
    							}
							?>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Nos idéologies</h2>
								</header>
								<ul class="features">
									<li>
										<span class="icon solid major style1 fa-code"></span>
										<h3>Excellent en Sécurité</h3>
										<p>La banque Stellar est moderne, accessible et reconnue pour son excellente sécurité. Elle allie technologie, simplicité et confiance au service de ses clients.</p>
									</li>
									<li>
										<span class="icon major style3 fa-copy"></span>
										<h3>Des Actions Rapides</h3>
										<p>Grâce à ses actions rapides, les clients peuvent gérer leur argent en quelques clics, en toute sécurité.</p>
									</li>
									<li>
										<span class="icon major style5 fa-gem"></span>
										<h3>Une Bonne Expérience</h3>
										<p>Une banque moderne qui offre une excellente expérience client grâce à des services simples, rapides et accessibles.</p>
									</li>
								</ul>
							</section>
					