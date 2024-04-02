<?php
// Inclure le modèle
include "Controllers\AvisController.php";
class AvisView {
    public function marque() {
        ?>
    <main>
        <section class="marques">
            <?php
            $controller = new MarqueController();
            $marques = $controller->get_marques();

            while ($marque = $marques->fetch()) {
                echo '<div class="marque" >';
                echo '<img src="' . $marque['img_marque'] . '" alt="' . $marque['Nom'] . '" style="border: 3px solid #FE8400;" onclick="showDetails(' . $marque['Id'] . ')" data-id="' . $marque['Id'] . '">';
                echo '</div>';
            }
            ?>
        </section>

        <section class="details" id="detailsSection">
        </section>
    </main>
<?php
    }
    public function get_vehicule_details($id) {
        $model = new AvisModel();
    
        // Get vehicle details
        $vehiculeDetails = $model->get_vehicule_details($id)->fetch();
    
        if ($vehiculeDetails) {
            // Display vehicle specifications
            echo '<div class="vehicle-details">';
            echo '<h2>' . $vehiculeDetails['modele'] . '</h2>';
            echo '<img src="' . $vehiculeDetails['image_url'] . '">';
            echo '<p><a href="/prj/vehiculeDetails?id=' . $vehiculeDetails['Id'] . '">Page description vehicule</a></p>';
            echo '</div>';
            echo '<div class="top-reviews">';
            // Affichage de tous les avis 
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $reviewsPerPage = 5;
    
            $allReviews = $model->get_paginated_reviews($id, $page, $reviewsPerPage);
    
            // Vérification si des avis existent
            if (!empty($allReviews['reviews'])) {
                echo '<h3>Tous les avis</h3>';
    
                foreach ($allReviews['reviews'] as $review) {
                    echo '<p>Utilisateur: ' . $review['username'] . '</p>';
                    echo '<p>Avis: ' . $review['Commentaire'] . '</p>';
                    echo '<p>Note: ' . $review['note'] . '</p>';
                    echo '<hr>';
                }
    
                // Pagination
                $totalPages = $allReviews['totalPages'];
                if ($totalPages > 1) {
                    echo '<div class="pagination">';
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="/prj/vehiculeReviews?id=' . $vehiculeDetails['Id'] . '&page=' . $i . '">' . $i . '</a>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun avis disponible pour le véhicule sélectionné.</p>';
            }
    
            echo '</div>';
        } else {
            echo '<p>Véhicule non trouvé.</p>';
        }
    }
    
}