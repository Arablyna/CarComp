<?php
require_once "Controllers/GestionAvisController.php";

class GestionAvisView
{
    public function avis()
    {
        echo "<br>
        <div class='gestion_avis'>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Véhicule ID</th>
                    <th>Utilisateur ID</th>
                    <th>Commentaire</th>
                    <th>Statut</th>
                    <th>Refuser</th>
                    <th>Valider</th>
                </tr>";

        $controller = new GestionAvisController();
        $res = $controller->get_avis();
        

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $voiture= $controller->getVehiculeModel($row['VehiculeId']);
            $user=$controller->getUsername($row['UtilisateurId']);
            echo "
            <tr>
                <td>{$row['Id']}</td>
                <td>{$voiture}</td>
                <td>{$user}</td>
                <td>{$row['Commentaire']}</td>
                <td>{$row['Statut']}</td>
                <td>
                    <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir bloquer cet avis ?\")'>
                        <input type='hidden' name='blockAvis' value='{$row['Id']}' >
                        <button type='submit'>Bloquer Avis</button>
                    </form>
                </td>
                <td>
                    <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir valider cet avis ?\")'>
                        <input type='hidden' name='validateAvis' value='{$row['Id']}' >
                        <button type='submit'>Valider Avis</button>
                    </form>
                </td>                  
            </tr>";
            
        }
        echo "</table></div>";
    }
}
?>
