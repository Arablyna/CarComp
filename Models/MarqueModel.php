<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "BddConnexion.php";
class MarqueModel{
    private $db;
    //Methode permettant la recuperation des news de la bdd
    public function get_marque($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `marque` WHERE Id='$id' and is_deleted=0 ");
        $stmt->execute();
        // Ne pas laisser la connexion à la BDD établie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_vehicule($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `vehicule` WHERE marque_id='$id' and is_deleted=0");
        $stmt->execute();
        // Do not leave the connection to the database established
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_marques() {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `marque` where is_deleted=0");
        $stmt->execute();
        // Ne pas laisser la connexion à la BDD établie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_vehicule_details($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `vehicule` WHERE Id='$id' and is_deleted=0");
        $stmt->execute();
        // Do not leave the connection to the database established
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_top_user_reviews($id_vehicule) {
        $this->db = new ConnexionBdd();
            $db = $this->db->connexion();
        
            $query = "SELECT avis.*, utilisateur.username
                      FROM avis 
                      JOIN utilisateur ON avis.UtilisateurId = utilisateur.Id 
                      WHERE avis.VehiculeId = :id_vehicule AND avis.is_marque = 0 
                      ORDER BY avis.nombre_like DESC LIMIT 3";
        
            $res = $db->prepare($query);
            $res->bindParam(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $res->execute();
        
            $commentVEH = $res->fetchAll(PDO::FETCH_ASSOC);
        
            $this->db->deconnexion($db);
        
            return $commentVEH;
        
    }
    public function get_all_reviews($id_vehicule) {
        $this->db = new ConnexionBdd();
            $db = $this->db->connexion();
        
            $query = "SELECT avis.*, utilisateur.username
                      FROM avis 
                      JOIN utilisateur ON avis.UtilisateurId = utilisateur.Id 
                      WHERE avis.VehiculeId = :id_vehicule AND avis.is_marque = 0 ";
        
            $res = $db->prepare($query);
            $res->bindParam(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $res->execute();
        
            $commentVEH = $res->fetchAll(PDO::FETCH_ASSOC);
        
            $this->db->deconnexion($db);
        
            return $commentVEH;
        
    }
    public function comparateur_plus_rech($id) {
        $this->db = new ConnexionBdd();
        $db = $this->db->connexion();
    
        $query = "SELECT comparison.*
                  FROM comparison 
                  WHERE vehicle1Id = :id OR vehicle2Id = :id OR vehicle3Id = :id OR vehicle4Id = :id
                  ORDER BY comparison.nbr_recherche DESC 
                  LIMIT 3";
    
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
    
        $topComparisons = $res->fetchAll(PDO::FETCH_ASSOC);
    
        $this->db->deconnexion($db);
    
        return $topComparisons;
    }
    
}

?>