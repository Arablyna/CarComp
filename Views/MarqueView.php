<?php
require_once "Controllers\MarqueController.php";
require_once "Controllers\ComparateurController.php";

class MarqueView {
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
        $model = new MarqueModel();

        // Get vehicle details
        $vehiculeDetails = $model->get_vehicule_details($id)->fetch();

        if ($vehiculeDetails) {
            // Display vehicle specifications
            echo '<div class="vehicle-details">';
            echo '<h2>' . $vehiculeDetails['modele'] . '</h2>';
            echo '<p>Année: ' . $vehiculeDetails['annee'] . '</p>';
            echo '<p>Puissance: ' . $vehiculeDetails['puissance'] . '</p>';
            echo '<p>Consommation: ' . $vehiculeDetails['consommation'] . '</p>';
            echo '<p>Capacité: ' . $vehiculeDetails['capacite'] . '</p>';
            echo '<p>Tarif indicatif: ' . $vehiculeDetails['tarif_indicatif'] . '</p>';
            echo '</div>';
            echo '<div class="comparison-section">';
            echo '<h3>Comparer :</h3>';
            $this->comparer($id);
            echo '</div>';

            // Add a form for user reviews and ratings
            echo '<div class="review-form">';
            echo '<h3>Donner un avis/note sur le vehicule:</h3>';
            echo '<form action="apirouteController.php" method="post">';
            echo '<label for="user_rating">Note:</label>';
            echo '<input type="number" name="user_rating" min="1" max="5" required>';
            echo '<label for="user_review">Avis:</label>';
            echo '<textarea name="user_review" rows="4" required></textarea>';
            // Add a hidden input field to store the vehicle ID
            echo '<input type="hidden" name="vehicle_id" value="' . $id . '">';
            echo '<input type="submit" value="Soumettre" name="review_submit">';
            echo '</form>';
            echo '</div>';

            echo '<div class="review-form">';
            echo '<h3>Donner un avis/note sur la marque</h3>';
            echo '<form action="apirouteController.php" method="post">';
            echo '<label for="user_rating">Note:</label>';
            echo '<input type="number" name="user_rating" min="1" max="5" required>';
            echo '<label for="user_review">Avis:</label>';
            echo '<textarea name="user_review" rows="4" required></textarea>';
            // Add a hidden input field to store the vehicle ID
            echo '<input type="hidden" name="vehicle_id" value="' . $vehiculeDetails['marque_id'] . '">';
            echo '<input type="submit" value="Soumettre" name="review_marque_submit">';
            echo '</form>';
            echo '</div>';



            echo '<div class="top-reviews">';
            // Display the top 3 user reviews
            $userReviews = $model->get_top_user_reviews($id);
            echo '<h3>Les 3 avis les plus appréciés</h3>';
            foreach ($userReviews as $review) {
                echo '<p>Utilisateur: ' . $review['username'] . '</p>';
                echo '<p>Avis: ' . $review['Commentaire'] . '</p>';
            }

            // Add a link to view all reviews
            echo '<a href="vehiculeReviews.php?id=' . $id . '">Voir tous les avis</a>';
            echo '</div>';
            /**$popularComparisons = $model->get_popular_comparisons($id);**/
            echo '<h3>Comparaisons populaires</h3>';
            $this->comparaison_populaire($id);
            
        } else {
            echo '<p>Véhicule non trouvé.</p>';
        }
    }
    public function get_vehicule_reviews($id) {
        $model = new MarqueModel();

        // Affichage de tous les avis 
       $allReviews = $model->get_all_reviews($id);

    // Vérification si des avis existent
       if (!empty($allReviews)) {
    echo '<h3>Tous les avis</h3>';

    foreach ($allReviews as $review) {
        echo '<p>Utilisateur: ' . $review['username'] . '</p>';
        echo '<p>Avis: ' . $review['Commentaire'] . '</p>';
        echo '<hr>'; 
    }
} else {
    echo '<p>Aucun avis disponible pour le véhicule sélectionné.</p>';
}

    }

    public function zone_1()
    {
        // Assuming $model is an instance of your model class
        $controller = new MarqueController();
        $marques = $controller->get_marques();
    
        echo "
        <div class='logo-section'>
            <div class='logo-header'>
                <h2><span class='orange-line'>Logo</span></h2>
                <p>Voici les principaux logos des marques principales</p>
            </div>
            <div class='logo-container'>
        ";
    
        while ($marque = $marques->fetch()) {
            echo "
                <div class='logo-item'>
                    <img class='logo-image' src='{$marque['img_marque']}' />
                    <div class='logo-text'>{$marque['Nom']}</div>
                </div>
            ";
        }
    
        echo "
            </div>
            <div class='separer'></div>
        </div>
        ";
    }
    public function comparer($id)
    { 
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Zone de Comparaison de Véhicules</title>
            <style>
                /* Add your style CSS here */

                .comparison-container {
                    display: flex;
                    justify-content: space-between;
                    margin: 20px;
                }

                .comparison-frame {
                    border: 2px solid #FE8400;
                    padding: 20px;
                    width: 22%;
                    box-sizing: border-box;
                    background-color: #FFE4C6;
                    border-radius: 10px;
                    margin-bottom: 20px;
                }

                form {
                    margin-top: 10px;
                }

                .form-group {
                    margin-bottom: 15px;
                }

                label {
                    display: block;
                    font-size: 16px;
                    margin-bottom: 5px;
                }

                select {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #FE8400;
                    border-radius: 5px;
                }

                button {
                    background-color: #141414;
                    color: #FFE4C6;
                    padding: 15px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    width: 100%;
                    margin-top: 20px;
                    font-size: 18px;
                }


            </style>
        </head>
        <body>
        <form action="./apirouteController.php" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="comparison-container">
        
    <?php
    // Appeler le contrôleur
    $controller = new ComparateurController();
    $marques = $controller->get_marque();
    $vehicules = $controller->get_vehicule();
    for ($i = 1; $i <= 3; $i++) {
        ?>
        <div class="comparison-frame">
            <h3>Formulaire Véhicule <?php echo $i; ?></h3>

                <div class="form-group">
                    <label for="marque<?php echo $i; ?>">Marque</label>
                    <select id="marque<?php echo $i; ?>" name="marque<?php echo $i; ?>">
                        <option value="">Sélectionnez une marque</option>
                        <?php
                        $marques = $controller->get_marque();
                        foreach ($marques as $marque) : ?>
                            <option value="<?php echo $marque['Nom']; ?>"><?php echo $marque['Nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modele<?php echo $i; ?>">Modèle</label>
                    <select id="modele<?php echo $i; ?>" name="modele<?php echo $i; ?>">
                        <option value="">Sélectionnez un modèle</option>
                        <?php
                        $vehicules = $controller->get_vehicule();
                        foreach ($vehicules as $vehicule) : ?>
                            <option value="<?php echo $vehicule['modele']; ?>"><?php echo $vehicule['modele']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="annee<?php echo $i; ?>">Année</label>
                    <select id="annee<?php echo $i; ?>" name="annee<?php echo $i; ?>">
                        <option value="">Sélectionnez une année</option>
                        <?php
                        $vehicules = $controller->get_vehicule();
                        foreach ($vehicules as $vehicule) : ?>
                            <option value="<?php echo $vehicule['annee']; ?>"><?php echo $vehicule['annee']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="version<?php echo $i; ?>">Version</label>
                    <select id="version<?php echo $i; ?>" name="version<?php echo $i; ?>">
                        <option value="">Sélectionnez une version</option>
                        <?php
                        $vehicules = $controller->get_vehicule();
                        foreach ($vehicules as $vehicule) : ?>
                            <option value="<?php echo $vehicule['version']; ?>"><?php echo $vehicule['version']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

        </div>
        <?php
    }
    ?>
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<button type='submit' onclick="this.form.submit()" name="Compare_vehicule_Submit" >Comparer</button>
</form>
</body>
</html>
<?php
    }

public function comparaison_populaire($id) {
    // Appeler le contrôleur
    $comp = new MarqueController();

    // Appeler la fonction comparateur_plus_recherche
    $topComparisons = $comp->comparateur_plus_rech($id);
    
    foreach ($topComparisons as $comparison) {
        // Appeler le contrôleur
        
        $id_vehicule1= $comparison['vehicle1Id'];
        $id_vehicule2=$comparison['vehicle2Id'];
        $id_vehicule3=$comparison['vehicle3Id'];
        $id_vehicule4=$comparison['vehicle4Id'];
        $comp = new ComparateurController();
        $vehicule1 = ($comp->get_vehicule_details($id_vehicule1))->fetch(PDO::FETCH_ASSOC);
        $vehicule2 = ($comp->get_vehicule_details($id_vehicule2))->fetch(PDO::FETCH_ASSOC);
        $vehicule3 = $id_vehicule3 > 0 ? ($comp->get_vehicule_details($id_vehicule3))->fetch(PDO::FETCH_ASSOC) : null;
        $vehicule4 = $id_vehicule4 > 0 ? ($comp->get_vehicule_details($id_vehicule4))->fetch(PDO::FETCH_ASSOC) : null;
        $url1 = 'http://localhost/prj/vehiculeDetails?id=' . $vehicule1['Id'];
        $url2 = 'http://localhost/prj/vehiculeDetails?id=' . $vehicule2['Id'];
        $url3 = $id_vehicule3 > 0 ? 'http://localhost/prj/vehiculeDetails?id=' . $vehicule3['Id'] : null;
        $url4 = $id_vehicule4 > 0 ? 'http://localhost/prj/vehiculeDetails?id=' . $vehicule4['Id'] : null;






        ?>
         <table class="comparison-table">
            <tr>
                <th></th>
                <th>Véhicule 1</th>
                <th>Véhicule 2</th>
                <?php if ($id_vehicule3 > 0) { ?><th>Véhicule 3</th><?php } ?>
                <?php if ($id_vehicule4 > 0) { ?><th>Véhicule 4</th><?php } ?>
            </tr>
            <tr>
                <td>Image</td>
                <?php
if (is_array($vehicule1) && isset($vehicule1['page_detaillee_url']) && isset($vehicule1['image_url'])) {
    echo '<td><a href="' . $url1 .  '" target="_blank"><img src="' . $vehicule1['image_url'] . '" alt="Véhicule 1"></a></td>';
} else {
    // Handle the case where $vehicule1 is not an array or does not have the expected keys
    echo '<td>Invalid data for Véhicule 1</td>';
}
?>                <td><a href="<?= $url2 ?>" target="_blank"><img src="<?php echo $vehicule2['image_url']; ?>" alt="Véhicule 2"></a></td>
                <?php if ($id_vehicule3 > 0) { ?><td><a href="<?= $url3 ?>" target="_blank"><img src="<?php echo $vehicule3['image_url']; ?>" alt="Véhicule 3"></a></td><?php } ?>
                <?php if ($id_vehicule4 > 0) { ?><td><a href="<?= $url4 ?>" target="_blank"><img src="<?php echo $vehicule4['image_url']; ?>" alt="Véhicule 4"></a></td><?php } ?>
            </tr>
            <tr>
                <td>Modèle</td>
                <td><?php echo $vehicule1['modele']; ?></td>
                <td><?php echo $vehicule2['modele']; ?></td>
                <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['modele']; ?></td><?php } ?>
                <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule4['modele']; ?></td><?php } ?>
            </tr>

                    <td>Version</td>
                    <td><?php echo $vehicule1['version']; ?></td>
                    <td><?php echo $vehicule2['version']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['version']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['version']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Année</td>
                    <td><?php echo $vehicule1['annee']; ?></td>
                    <td><?php echo $vehicule2['annee']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['annee']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['annee']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Note</td>
                    <td><?php echo $vehicule1['note']; ?></td>
                    <td><?php echo $vehicule2['note']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['note']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['note']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Puissance</td>
                    <td><?php echo $vehicule1['puissance']; ?></td>
                    <td><?php echo $vehicule2['puissance']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['puissance']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['puissance']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Consommation</td>
                    <td><?php echo $vehicule1['consommation']; ?></td>
                    <td><?php echo $vehicule2['consommation']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['consommation']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['consommation']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Capacité</td>
                    <td><?php echo $vehicule1['capacite']; ?></td>
                    <td><?php echo $vehicule2['capacite']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['capacite']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['capacite']; ?></td><?php } ?>
                </tr>
                <tr>
                    <td>Tarif Indicatif</td>
                    <td><?php echo $vehicule1['tarif_indicatif']; ?></td>
                    <td><?php echo $vehicule2['tarif_indicatif']; ?></td>
                    <?php if ($id_vehicule3 > 0) { ?><td><?php echo $vehicule3['tarif_indicatif']; ?></td><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><td><?php echo $vehicule3['tarif_indicatif']; ?></td><?php } ?>
                </tr>
            </table>
            
            <?php
                echo '</div>'; // Close the container
        
    }
}
}




?>


