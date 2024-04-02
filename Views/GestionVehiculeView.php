<?php
require_once "Models\GestionVehiculeModel.php";
require_once "Controllers\GestionVehiculeController.php";

class GestionVehiculeView
{
    public function vehicule($id)
    {
        echo "<br>
        <div class='gestion_vehicule'>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Version</th>
                    <th>Année</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>";

        // Le contrôleur pour récupérer les données de la table vehicule
        $vehiculeController = new VehiculeController();
        $vehiculeRes = $vehiculeController->get_vehicules($id);

        // Pour chaque véhicule récupéré de la table vehicule, on l'affiche
        while ($vehiculeRow = $vehiculeRes->fetch(PDO::FETCH_ASSOC)) {
            echo "
<tr>
    <td>{$vehiculeRow['Id']}</td>
    <td>{$vehiculeRow['marque_id']}</td>
    <td>{$vehiculeRow['modele']}</td>
    <td>{$vehiculeRow['version']}</td>
    <td>{$vehiculeRow['annee']}</td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer ce véhicule ?\")'>
            <input name='deletevehicule' value='{$vehiculeRow['Id']}' >
            <button type='submit'>Delete Vehicule</button>
        </form>
    </td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir modifier ce véhicule ?\")'>
            <input name='modifyvehicule' value='{$vehiculeRow['Id']}' >
            <button type='submit'>Modify Vehicule</button>
        </form>
    </td>
    <td>
        <form action='./apirouteController.php' method='post'>
            <input name='vehiculeId' value='{$vehiculeRow['Id']}' >
            <button onclick='this.form.submit()'>Voir Détails</button>
        </form>
    </td>
</tr>";

        }

        echo "</table>
        <form action='./apirouteController.php' method='post' >
            <input name='addVehicule' value='{$id}' >
            <button onclick='this.form.submit()'>Ajouter Vehicule</button>
        </form>
    </div>";
    }
}
?>

