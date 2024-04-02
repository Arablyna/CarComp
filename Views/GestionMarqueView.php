<?php
require_once "Models\GestionMarqueModel.php";
require_once "Controllers\GestionMarqueController.php"; 

class GestionMarqueView
{
    public function marque()
    {
        echo "<br>
        <div class='gestion_marque'>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Pays d'Origine</th>
                    <th>Siege Social</th>
                    <th>Année de Création</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Voitures de cette marque</th> <!-- Nouvelle colonne -->
                </tr>";
        
        // Le contrôleur pour récupérer les données de la table marque
        $marqueController = new GestionMarqueController();
        $marqueRes = $marqueController->get_marque();

        // Pour chaque marque récupérée de la table marque, on l'affiche
        while ($marqueRow = $marqueRes->fetch(PDO::FETCH_ASSOC)) {
            echo "
<tr>
    <td>{$marqueRow['Id']}</td>
    <td><img src='{$marqueRow['img_marque']}' alt='Marque Image' width='50'></td>
    <td>{$marqueRow['Nom']}</td>
    <td>{$marqueRow['PaysOrigine']}</td>
    <td>{$marqueRow['SiegeSocial']}</td>
    <td>{$marqueRow['AnneeCreation']}</td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer cette marque ?\")'>
            <input name='deletemarque' value='{$marqueRow['Id']}' >
            <button type='submit'>Delete Marque</button>
        </form>
    </td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir modifier cette marque ?\")'>
            <input name='modifymarque' value='{$marqueRow['Id']}' >
            <button type='submit'>Modify Marque</button>
        </form>
    </td>
    <td>
        <form action='./apirouteController.php' method='post'>
            <input name='marqueId' value='{$marqueRow['Id']}' >
            <button onclick='this.form.submit()'>Voir Voitures</button>
        </form>
    </td>
</tr>";

        }

        echo "</table>
            <form action='./controllers/apirouteController.php' method='post' name='addmarqueForm'>
                <button onclick='.' name='addmarqueForm'><a href='/prj/addMarque.php' class='button-link'>Ajouter Marque</a></button>
            </form>
        </div>";
    }
}
?>


