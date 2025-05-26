                        <br>
                        <!-- Table -->
									<section>
										<h2>Liste des Dépenses :</h2>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Montant</th>
														<th>Date</th>
														<th>Type</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Item One</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Two</td>
														<td>Vis ac commodo adipiscing arcu aliquet.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Three</td>
														<td> Morbi faucibus arcu accumsan lorem.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Four</td>
														<td>Vitae integer tempus condimentum.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Five</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
												</tbody>
											</table>
										</div>
									</section>
<center>
<div class="container mt-4">
    <h1 class="text-center">Ajouter une dépense</h1>

    <div class="w-50 mx-auto p-4 border rounded bg-light shadow">
        <form action="controller/livre/admin.php" method="POST">
            <div class="mb-3">
                <label for="titre" class="form-label">Montant</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <?php 
						include("Controller/Categorie/SelectCat.php");
						foreach($categories as $categorie){ ?>
                        <option value="<?php echo $categorie['categorie_id']; ?>">
                            <?php echo $categorie['libelle']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="valider" class="btn btn-primary w-100">Valider</button>
        </form>
    </div>
</div>
</center>