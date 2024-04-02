<?php 
require_once "App\App.php";

// Vérifiez si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $accueil = new website();
    $accueil->build_voiture($id);
} else {
    // Gérer le cas où l'ID n'est pas spécifié dans l'URL
    echo "L'ID n'a pas été spécifié dans l'URL.";
}
?>