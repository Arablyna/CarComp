<?php
require_once "BddConnexion.php";

class GestionAvisModel {
    private $db;

    public function get_avis() {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM avis WHERE is_deleted = 0");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }

    public function getUsername($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT username FROM `utilisateur` WHERE Id='$id' AND is_blocked = 0");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt->fetchColumn();
    }

    public function getVehiculeModel($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT modele FROM `vehicule` WHERE Id='$id' AND is_deleted = 0");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt->fetchColumn();
    }
}
?>
