<?php
require_once "Models\GestionMarqueModel.php";

class AddMarqueView
{
    public function marque()
    {
        ?>
        <div class='marque-management-container'>
            <h1>Ajouter Marque</h1>

            <!-- Formulaire d'ajout de marque -->
            <div class='add-marque-form'>
                <form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">
                    <label for="img_marque">Marque Image:</label>
                    <input type="file" name="img_marque" required>
                    <br>

                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" required>
                    <br>

                    <label for="paysOrigine">Pays d'Origine:</label>
                    <input type="text" name="paysOrigine" required>
                    <br>

                    <label for="siegeSocial">Siège Social:</label>
                    <input type="text" name="siegeSocial" required>
                    <br>

                    <label for="anneeCreation">Année de Création:</label>
                    <input type="text" name="anneeCreation" placeholder="YYYY" required>
                    <br>

                    <button type='submit' onclick="this.form.submit()" name="marquesubmit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                </form>
            </div>
        </div>

        </body>
        </html>
        <?php
    }
}
?>
