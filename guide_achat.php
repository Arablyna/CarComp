<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide d'achat</title>
    <style>
        body {
            font-family: 'Montserrat', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .guide-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .vehicle-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .vehicle-card:hover {
            transform: scale(1.05);
        }

        .vehicle-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .vehicle-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .vehicle-card p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }

        .description-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Guide d'achat</h1>
    </header>

    <div class="guide-container">
        <h2>Conseils pour l'achat d'un véhicule</h2>
        <p>
        
Notre guide d'achat de voitures offre des conseils pour une décision éclairée sur votre prochaine voiture, couvrant diverses catégories telles que familiales, économiques en carburant ou sportives. Explorez des articles détaillés sur les critères d'achat, de la consommation de carburant à la sécurité, découvrez les tendances technologiques et trouvez la solution de transport adaptée à votre style de vie. Un compagnon incontournable pour naviguer dans le monde automobile.

        </p>
        <?php
require_once "Controllers\ComparateurController.php";
$controller = new ComparateurController();
$vehicules = $controller->get_vehicule();

while ($vehicule = $vehicules->fetch()) {
    echo '<div class="vehicle-card">';
    echo '<img src="' . $vehicule['image_url'] . '" alt="' . $vehicule['modele'] . '" style="border: 3px solid #FE8400;" onclick="showDetails(' . $vehicule['Id'] . ')" data-id="' . $vehicule['Id'] . '">';
    echo '<h3>' . $vehicule['modele'] . '</h3>';
    echo '<p>' . $vehicule['version'] . '</p>';
    echo '<a href="/prj/vehiculeDetails?id=' . $vehicule['Id'] . '" class="description-link">Voir la description</a>';
    echo '</div>';
}
?>



    </div>

</body>
</html>
