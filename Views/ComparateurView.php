<?php
require_once "Models\ComparateurModel.php";
require_once "Controllers\ComparateurController.php";
class ComparateurView {
    public function zone2() {
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
        <form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">
        <div class="comparison-container">
        
    <?php
    // Appeler le contrôleur
    $controller = new ComparateurController();
    $marques = $controller->get_marque();
    $vehicules = $controller->get_vehicule();
    for ($i = 1; $i <= 4; $i++) {
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
<button type='submit' onclick="this.form.submit()" name="CompareSubmit" >Comparer</button>
</form>
</body>
</html>
        <?php
    }
    public function tableauComparatif($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tableau Comparatif</title>
            <style>
                /* Add your CSS styles here */

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    border: 1px solid #FE8400;
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #141414;
                    color: #FFE4C6;
                }

                td {
                    background-color: #FFE4C6;
                }

                img {
                    max-width: 100px;
                    max-height: 80px;
                }

            </style>
        </head>
        <body>
            <?php
            // Appeler le contrôleur
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
            <table>
                <tr>
                    <th></th>
                    <th>Véhicule 1</th>
                    <th>Véhicule 2</th>
                    <?php if ($id_vehicule3 > 0) { ?><th>Véhicule 3</th><?php } ?>
                    <?php if ($id_vehicule4 > 0) { ?><th>Véhicule 4</th><?php } ?>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><a href="<?= $url1 ?>" target="_blank"><img src="<?php echo $vehicule1['image_url']; ?>" alt="Véhicule 1"></a></td>
                    <td><a href="<?= $url2 ?>" target="_blank"><img src="<?php echo $vehicule2['image_url']; ?>" alt="Véhicule 2"></a></td>
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
            ?>
        </body>
        </html>
        <?php
    }
    public function zone3() {
        // Appeler le contrôleur
        $comp = new ComparateurController();
    
        // Appeler la fonction comparateur_plus_recherche
        $topComparisons = $comp->comparateur_plus_recherche();
        echo "
        <div class='logo-section'>
            <div class='logo-header'>
                <h2><span class='orange-line'>Zone 03</span></h2>
                <p>les comparaisons 2 par 2 les plus recherchées </p>
                <div class='button-container'>
                <a href='../prj/guide_achat'>
                <button type='button'>Guide d'achat</button>
                </a>
                </div>
            </div>
        </div>
        ";
        echo"<br>";
        echo"<br>";
        echo"<br>";
        
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
            $id_vehicule1= $comparison['vehicle1Id'];
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
                    <td><a href="<?= $url1 ?>" target="_blank"><img src="<?php echo $vehicule1['image_url']; ?>" alt="Véhicule 1"></a></td>
                    <td><a href="<?= $url2 ?>" target="_blank"><img src="<?php echo $vehicule2['image_url']; ?>" alt="Véhicule 2"></a></td>
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
