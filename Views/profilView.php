<?php
require_once "Models\AvisModel.php";

class ProfilView{
    public function profil($id_utilisateur) {
        $model = new AvisModel(); 
    
        // Récupérer les détails de l'utilisateur
        $userDetails = $model->get_user($id_utilisateur)->fetch(PDO::FETCH_ASSOC);
    
        if ($userDetails) {
            echo '<div class="user-details">';
            echo '<h2>' . $userDetails['Nom'] . ' ' . $userDetails['Prenom'] . '</h2>';
            echo '<p>Sexe: ' . $userDetails['Sexe'] . '</p>';
            echo '<p>Username: ' . $userDetails['username'] . '</p>';
            echo '</div>';
    
            // Récupérer les véhicules favoris de l'utilisateur
            $favVehicules = $model->get_fav_vehicule_users($id_utilisateur);
    
            echo '<div class="fav-vehicles">';
            // Vérifier si des véhicules favoris existent
            if (!empty($favVehicules)) {
                echo '<h3>Véhicules favoris</h3>';
    
                foreach ($favVehicules as $favVehicule) {
                    echo '<img src="' . $favVehicule['image_url'] . '">';
                    echo '<p>Modèle: ' . $favVehicule['modele'] . '</p>';
                    echo '<p>Année: ' . $favVehicule['annee'] . '</p>';
                    echo '<p>Note: ' . $favVehicule['note'] . '</p>';
                    echo '<hr>';
                }
            } else {
                echo '<p>Aucun véhicule favori trouvé pour cet utilisateur.</p>';
            }
    
            echo '</div>';
        } else {
            echo '<p>Utilisateur non trouvé.</p>';
        }
    }
    
}