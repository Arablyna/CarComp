<?php
// Use require_once because the script cannot run if there is a connection error
require_once "BddConnexion.php";

class ModifyVehiculeModel {
    private $db;

    // Method for retrieving data of a vehicle from the database
    public function get_vehicule($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `vehicule` WHERE Id='$id'");
        $stmt->execute();
        // Do not leave the connection to the database established
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>
