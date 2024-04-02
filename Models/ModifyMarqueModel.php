<?php
// Utiliser require car le script ne peut pas s'exécuter s'il y a une erreur de connexion
require_once "BddConnexion.php";

class ModifyMarqueModel {
    private $db;

    // Méthode permettant la récupération des données d'une marque de la base de données
    public function get_marque($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `marque` WHERE Id='$id'");
        $stmt->execute();
        // Ne pas laisser la connexion à la BDD établie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>

