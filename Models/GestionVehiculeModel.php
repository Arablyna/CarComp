<?php
require_once "BddConnexion.php";

class VehiculeModel
{
    private $db;

    public function get_vehicules($id)
    {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM vehicule where marque_id='$id' AND is_deleted = 0 ");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}
?>
