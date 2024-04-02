<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "Models/BddConnexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone de Comparaison de Véhicules</title>
    <style>
        /* Ajoutez votre style CSS ici */
        .comparison-container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .comparison-frame {
            border: 1px solid #ccc;
            padding: 10px;
            width: 22%;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="comparison-container">
    <?php
    // Simulez l'extraction des valeurs de la base de données
    $marques = ["Toyota", "Ford", "BMW", "Honda"];
    $modeles = ["Rav4", "Corolla", "Mustang", "Explorer", "3 Series", "X5", "Civic", "CR-V"];
    $versions = ["XLEe", "Sedan", "GT", "Limited", "320i", "xDrive40i", "Touring", "EX-L"];
    $annees = [2022, 2023];

    for ($i = 1; $i <= 4; $i++) {
        ?>
        <div class="comparison-frame">
            <h3>Formulaire Véhicule <?php echo $i; ?></h3>
            <form id="form<?php echo $i; ?>">
                <div class="form-group">
                    <label for="marque<?php echo $i; ?>">Marque</label>
                    <select id="marque<?php echo $i; ?>" name="marque<?php echo $i; ?>">
                        <?php foreach ($marques as $marque) : ?>
                            <option value="<?php echo $marque; ?>"><?php echo $marque; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modele<?php echo $i; ?>">Modèle</label>
                    <select id="modele<?php echo $i; ?>" name="modele<?php echo $i; ?>">
                        <?php foreach ($modeles as $modele) : ?>
                            <option value="<?php echo $modele; ?>"><?php echo $modele; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="version<?php echo $i; ?>">Version</label>
                    <select id="version<?php echo $i; ?>" name="version<?php echo $i; ?>">
                        <?php foreach ($versions as $version) : ?>
                            <option value="<?php echo $version; ?>"><?php echo $version; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="annee<?php echo $i; ?>">Année</label>
                    <select id="annee<?php echo $i; ?>" name="annee<?php echo $i; ?>">
                        <?php foreach ($annees as $annee) : ?>
                            <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
</div>

<button onclick="compareVehicles()">Comparer les Véhicules</button>

<script>
    function compareVehicles() {
        // Ajoutez ici la logique pour récupérer les valeurs des formulaires et effectuer la comparaison
        alert("Comparaison des véhicules en cours...");
    }
</script>

</body>
</html>
