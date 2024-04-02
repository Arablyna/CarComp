<?php
require_once "Models\GestionMarqueModel.php";
require_once "Controllers\ModifyMarqueController.php";

class ModifyMarqueView {
    public function marque($id) {
        $cntr = new ModifyMarqueController();
        $marque = ($cntr->get_marque($id))->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class='marque-management-container'>
            <h1>Modifier Marque</h1>

            <!-- Formulaire de modification de marque -->
            <div class='modify-marque-form'>
                <form id="form3" method="post" action="apirouteController.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="r-nom">Nom</label>
                        <input required type="text" class="form-control" id="r-nom" name="nom" value="<?php echo $marque['Nom'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="img_marque">Marque Image:</label>
                        <input type="file" name="img_marque" value="<?php echo $marque['img_marque'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="paysOrigine">Pays d'Origine</label>
                        <input required type="text" class="form-control" id="paysOrigine" name="paysOrigine" value="<?php echo $marque['PaysOrigine'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="siegeSocial">Siège Social</label>
                        <input required type="text" class="form-control" id="siegeSocial" name="siegeSocial" value="<?php echo $marque['SiegeSocial'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="anneeCreation">Année de Création</label>
                        <input required type="text" class="form-control" id="anneeCreation" name="anneeCreation" value="<?php echo $marque['AnneeCreation'] ?>">
                    </div>
                    <div class="row">
                        <button id="submit" onclick="this.form.submit()" name="modifymarquesubmit" value="<?php echo $id ?>" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
}
?>
