<?php
require_once "Models\GestionVehiculeModel.php";
require_once "Controllers\ModifyVehiculeController.php";

class ModifyVehiculeView {
    public function vehicule($id) {
        $cntr = new ModifyVehiculeController();
        $vehicule = ($cntr->getVehicule($id))->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class='vehicule-management-container'>
            <h1>Modifier Vehicule</h1>

            <!-- Formulaire de modification de vehicule -->
            <div class='modify-vehicule-form'>
                <form id="form3" method="post" action="apirouteController.php" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="id">id</label>
                        <input required type="text" class="form-control" id=id" name="id" value="<?php echo $vehicule['Id'] ?>">
                    </div>
                <div class="form-group">
                        <label for="marque_id">marque_id</label>
                        <input required type="text" class="form-control" id="marque_id" name="marque_id" value="<?php echo $vehicule['marque_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="modele">Modèle</label>
                        <input required type="text" class="form-control" id="modele" name="modele" value="<?php echo $vehicule['modele'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="version">Version</label>
                        <input required type="text" class="form-control" id="version" name="version" value="<?php echo $vehicule['version'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="annee">Année</label>
                        <input required type="text" class="form-control" id="annee" name="annee" value="<?php echo $vehicule['annee'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" class="form-control" id="note" name="note" value="<?php echo $vehicule['note'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="puissance">Puissance</label>
                        <input type="text" class="form-control" id="puissance" name="puissance" value="<?php echo $vehicule['puissance'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="consommation">Consommation</label>
                        <input type="text" class="form-control" id="consommation" name="consommation" value="<?php echo $vehicule['consommation'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="capacite">Capacité</label>
                        <input type="text" class="form-control" id="capacite" name="capacite" value="<?php echo $vehicule['capacite'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tarif_indicatif">Tarif Indicatif</label>
                        <input type="text" class="form-control" id="tarif_indicatif" name="tarif_indicatif" value="<?php echo $vehicule['tarif_indicatif'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="file" name="image_url" value="<?php echo $vehicule['image_url'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="page_detaillee_url">Page Détailée URL</label>
                        <input type="text" class="form-control" id="page_detaillee_url" name="page_detaillee_url" value="<?php echo $vehicule['page_detaillee_url'] ?>">
                    </div>
                    <div class="row">
                        <button id="submit" onclick="this.form.submit()" name="modifyvehiculesubmit" value="<?php echo $id ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
}
?>

