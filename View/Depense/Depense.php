<?php
// Inclure le contrôleur des dépenses et la connexion BDD
include('bdd/bdd.php');
include('Controller/Depense/DepenseController.php');

// Instancier le contrôleur
$depenseController = new DepenseController($bdd);

// Traitement du formulaire d'ajout
if (isset($_POST['ajouter_depense'])) {
    $montant = $_POST['montant'];
    $libelle = $_POST['libelle'];
    $date = $_POST['date'];
    $moyendepaie = $_POST['moyendepaie'];
    
    // Ajouter la dépense
    $depenseController->ajouter($montant, $libelle, $date, $moyendepaie);
    
    // Déduire le montant du portefeuille (virement négatif)
    include('Controller/Portefeuille/PortefeuilleController.php');
    $portefeuilleController = new PortefeuilleController($bdd);
    
    // Créer une transaction négative dans le portefeuille
    $montant_negatif = -abs($montant); // S'assurer que le montant est négatif
    $categorie_id = 1; // Vous pouvez adapter selon vos besoins ou récupérer depuis le formulaire
    
    $portefeuilleController->ajouter($montant_negatif, null, $categorie_id, $date);
}

// Traitement des actions (supprimer, etc.)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    switch ($action) {
        case 'supprimer':
            $depenseController->supprimer($id);
            break;
    }
}

// Récupérer la liste des dépenses
$depenses = $depenseController->afficherListe();
?>

<br>
<!-- Table -->
<section>
    <h2>Liste des Dépenses :</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Moyen de paiement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($depenses)): ?>
                    <?php foreach ($depenses as $depense): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($depense['libelle']); ?></td>
                            <td><?php echo number_format($depense['montant'], 2); ?> €</td>
                            <td><?php echo date('d/m/Y H:i', strtotime($depense['date'])); ?></td>
                            <td><?php echo htmlspecialchars($depense['moyendepaie']); ?></td>
                            <td>
                                <a href="?page=depense&action=modifier&id=<?php echo $depense['id']; ?>" class="button small">Modifier</a>
                                <a href="?page=depense&action=supprimer&id=<?php echo $depense['id']; ?>" class="button small special" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Aucune dépense trouvée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<center>
<div class="container mt-4">
    <h1 class="text-center">Ajouter une dépense</h1>

    <div class="w-50 mx-auto p-4 border rounded bg-light shadow">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé de la dépense" required>
            </div>

            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant" placeholder="Entrez le montant" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="moyendepaie" class="form-label">Moyen de paiement</label>
                <select name="moyendepaie" id="moyendepaie" class="form-control" required>
                    <option value="">Sélectionner un moyen de paiement</option>
                    <?php 
                    // Récupérer les catégories pour les moyens de paiement
                    $req_cat = $bdd->prepare("SELECT * FROM categorie");
                    $req_cat->execute();
                    $categories = $req_cat->fetchAll(PDO::FETCH_ASSOC);
                    foreach($categories as $categorie): ?>
                        <option value="<?php echo htmlspecialchars($categorie['libelle']); ?>">
                            <?php echo htmlspecialchars($categorie['libelle']); ?>
                        </option>
                    <?php endforeach; ?>
                    <option value="especes">Espèces</option>
                    <option value="virement">Virement</option>
                </select>
            </div>

            <button type="submit" name="ajouter_depense" class="btn btn-primary w-100">Ajouter la dépense</button>
        </form>
    </div>
</div>
</center>