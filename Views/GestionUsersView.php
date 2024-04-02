<?php
require_once "Models\GestionUsersModel.php";
require_once "Controllers\GestionUsersController.php";

class GestionUsersView
{
    public function user()
    {
        echo "<br>
        <div class='gestion_users'>
            <label for='filter'>Filtrer par sexe:</label>
            <select id='filter'>
                <option value=''>Tous</option>
                <option value='male'>Homme</option>
                <option value='femelle'>Femme</option>
            </select>
            <button id='sort'>Trier par sexe</button>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Sexe</th>
                    <th>bloquer</th>
                    <th>Valider</th>
                </tr>";

        // Le contrôleur pour récupérer les données de la bdd
        $controller = new GestionUsersController();
        $res = $controller->get_users();

        // Pour chaque utilisateur récupéré de la bdd, on l'affiche
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "
<tr class='{$row['Sexe']}'>
    <td>{$row['Id']}</td>
    <td>{$row['username']}</td>
    <td>{$row['Nom']}</td>
    <td>{$row['Prenom']}</td>
    <td>{$row['Sexe']}</td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir bloquer cet utilisateur ?\")'>
            <input type='hidden' name='deleteUser' value='{$row['Id']}' >
            <button type='submit'>Bloquer User</button>
        </form>
    </td>
    <td>
        <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir valider cet utilisateur ?\")'>
            <input type='hidden' name='ValidateUser' value='{$row['Id']}' >
            <button type='submit'>Valider User</button>
        </form>
    </td>                  
</tr>";

        }

        echo "</table></div>";

        // Ajoutez le script JavaScript pour la fonctionnalité de filtrage
        echo "<script>
        document.getElementById('filter').addEventListener('change', function() {
            var selectedValue = this.value;
            var rows = document.querySelectorAll('.gestion_users table tr');
    
            rows.forEach(function(row) {
                if (selectedValue === '' || row.classList.contains(selectedValue)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    
        document.getElementById('sort').addEventListener('click', function() {
            var rows = document.querySelectorAll('.gestion_users table tr');
    
            var sortedRows = Array.from(rows).slice(1).sort(function(a, b) {
                var aValue = a.querySelector('td:nth-child(5)').textContent;
                var bValue = b.querySelector('td:nth-child(5)').textContent;
    
                return aValue.localeCompare(bValue);
            });
    
            document.querySelector('.gestion_users table tbody').innerHTML = '';
            sortedRows.forEach(function(row) {
                document.querySelector('.gestion_users table tbody').appendChild(row);
            });
        });
    </script>
    ";
    }
}
?>
