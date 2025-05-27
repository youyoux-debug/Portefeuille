<?php
include('bdd/bdd.php');
include('Controller/Portefeuille/PortefeuilleController.php');
include('Controller/Depense/DepenseController.php');

// Instancier les contrôleurs
$portefeuilleController = new PortefeuilleController($bdd);
$depenseController = new DepenseController($bdd);

// Traitement du formulaire d'ajout au portefeuille
if (isset($_POST['ajouter_portefeuille'])) {
    $montant = $_POST['montant'];
    $depense_id = !empty($_POST['depense_id']) ? $_POST['depense_id'] : null;
    $categorie_id = $_POST['categorie_id'];
    $date = $_POST['date'];
    
    $portefeuilleController->ajouter($montant, $depense_id, $categorie_id, $date);
}

$req = $bdd->prepare("
    SELECT p.montant, p.date, d.libelle as depense_libelle, c.libelle as categorie_libelle 
    FROM portefeuille p 
    LEFT JOIN depense d ON p.depense_id = d.id 
    LEFT JOIN categorie c ON p.categorie_id = c.id 
    ORDER BY p.date DESC
");
$req->execute();
$portefeuilles = $req->fetchAll(PDO::FETCH_ASSOC);

// Calculer le solde total (vous pouvez adapter cette logique selon vos besoins)
$req_solde = $bdd->prepare("SELECT SUM(montant) as solde FROM portefeuille");
$req_solde->execute();
$solde = $req_solde->fetch(PDO::FETCH_ASSOC);
$solde_total = $solde['solde'] ?? 5000; // 5000 par défaut si aucune donnée
?>

<!-- Get Started -->
<section id="cta" class="main special">
    <header class="major">
        <h2>Vous avez dans votre compte :</h2>
        <div class="col-6 col-12-medium">
            <ul class="actions stacked">
                <li><a class="button primary fit"><?php echo number_format($solde_total, 2); ?> €</a></li>
            </ul>
        </div>
    </header>
</section>

<!-- Table -->
<section>
    <h2>Catégorie de paiement :</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Dépense</th>
                    <th>Catégorie</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($portefeuilles)): ?>
                    <?php foreach ($portefeuilles as $portefeuille): ?>
                        <tr>
                            <td><?php echo number_format($portefeuille['montant'], 2); ?> €</td>
                            <td><?php echo date('d/m/Y', strtotime($portefeuille['date'])); ?></td>
                            <td><?php echo htmlspecialchars($portefeuille['depense_libelle'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($portefeuille['categorie_libelle'] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Aucune transaction trouvée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Formulaire d'ajout au portefeuille -->
<section>
    <h2>Ajouter une transaction au portefeuille :</h2>
    <center>
        <div class="container mt-4">
            <div class="w-50 mx-auto p-4 border rounded bg-light shadow">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="number" step="0.01" class="form-control" id="montant" name="montant" placeholder="Entrez le montant" required>
                    </div>

                    <div class="mb-3">
                        <label for="depense_id" class="form-label">Dépense</label>
                        <select name="depense_id" id="depense_id" class="form-control">
                            <option value="">Sélectionner une dépense (optionnel)</option>
                            <?php 
                            $depenses = $depenseController->afficherListe();
                            foreach($depenses as $depense): ?>
                                <option value="<?php echo $depense['id']; ?>">
                                    <?php echo htmlspecialchars($depense['libelle']); ?> (<?php echo $depense['montant']; ?>€)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                            <option value="">Sélectionner une catégorie</option>
                            <?php 
                            $req_cat = $bdd->prepare("SELECT * FROM categorie");
                            $req_cat->execute();
                            $categories = $req_cat->fetchAll(PDO::FETCH_ASSOC);
                            foreach($categories as $categorie): ?>
                                <option value="<?php echo $categorie['id']; ?>">
                                    <?php echo htmlspecialchars($categorie['libelle']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <button type="submit" name="ajouter_portefeuille" class="btn btn-primary w-100">Ajouter au portefeuille</button>
                </form>
            </div>
        </div>
    </center>
</section>