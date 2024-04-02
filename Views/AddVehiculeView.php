<?php
require_once "Models\GestionVehiculeModel.php";

class AddVehiculeView
{
    public function vehicule($id)
    {
        ?>
        <div class='vehicule-management-container'>
            <h1>Ajouter Véhicule</h1>

            <!-- Formulaire d'ajout de véhicule -->
            <div class='add-vehicule-form'>
                <form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">

                    <label for="marque_id">Marque ID:</label>
                    <input type="text" name="marque_id" value="<?php echo $id ?>" required>
                    <br>

                    <label for="modele">Modèle:</label>
                    <input type="text" name="modele" required>
                    <br>

                    <label for="version">Version:</label>
                    <input type="text" name="version" required>
                    <br>

                    <label for="annee">Année:</label>
                    <input type="text" name="annee" placeholder="YYYY" required>
                    <br>

                    <label for="note">Note:</label>
                    <input type="text" name="note" required>
                    <br>

                    <label for="puissance">Puissance:</label>
                    <input type="text" name="puissance" required>
                    <br>

                    <label for="consommation">Consommation:</label>
                    <input type="text" name="consommation" required>
                    <br>

                    <label for="capacite">Capacité:</label>
                    <input type="text" name="capacite" required>
                    <br>

                    <label for="tarif_indicatif">Tarif Indicatif:</label>
                    <input type="text" name="tarif_indicatif" required>
                    <br>

                    <label for="image_url">Image URL:</label>
                    <input type="file" name="image_url" required>
                    <br>

                    <label for="page_detaillee_url">Page Détailée URL:</label>
                    <input type="text" name="page_detaillee_url" required>
                    <br>

                    <button type='submit' onclick="this.form.submit()" name="vehiculesubmit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                </form>
            </div>
        </div>
        </body>
        </html>
        <?php
    }
}
?>
