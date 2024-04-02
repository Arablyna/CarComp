<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "BddConnexion.php";
class AvisModel{
    private $db;
    //Methode permettant la recuperation des news de la bdd
    public function get_marque($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `marque` WHERE Id='$id' and is_deleted=0");
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
                      WHERE avis.VehiculeId = :id_vehicule AND avis.is_marque = 0  and avis.is_deleted=0 and avis.Statut='valide'
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
                      WHERE avis.VehiculeId = :id_vehicule AND avis.is_marque = 0 and avis.is_deleted=0 and avis.Statut='valide'";
        
            $res = $db->prepare($query);
            $res->bindParam(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
            $res->execute();
        
            $commentVEH = $res->fetchAll(PDO::FETCH_ASSOC);
        
            $this->db->deconnexion($db);
        
            return $commentVEH;
        
    }
    public function get_paginated_reviews($id_vehicule, $page, $perPage) {
        $this->db = new ConnexionBdd();
        $db = $this->db->connexion();
    
        $offset = ($page - 1) * $perPage;
    
        $query = "SELECT avis.*, utilisateur.username
                  FROM avis 
                  JOIN utilisateur ON avis.UtilisateurId = utilisateur.Id 
                  WHERE avis.VehiculeId = :id_vehicule AND avis.is_marque = 0 and avis.is_deleted=0 and avis.Statut='valide'
                  LIMIT :offset, :perPage";
    
        $res = $db->prepare($query);
        $res->bindParam(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
        $res->bindParam(":offset", $offset, PDO::PARAM_INT);
        $res->bindParam(":perPage", $perPage, PDO::PARAM_INT);
        $res->execute();
    
        $reviews = $res->fetchAll(PDO::FETCH_ASSOC);
    
        // Count total reviews for pagination
        $countQuery = "SELECT COUNT(*) as total FROM avis WHERE VehiculeId = :id_vehicule AND is_marque = 0 and  is_deleted=0";
        $countRes = $db->prepare($countQuery);
        $countRes->bindParam(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
        $countRes->execute();
        $totalReviews = $countRes->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalReviews / $perPage);
    
        $this->db->deconnexion($db);
    
        return [
            'reviews' => $reviews,
            'totalPages' => $totalPages,
        ];
    }
    

public function get_fav_vehicule_users($id_utilisateur) {
    $this->db = new ConnexionBdd();
    $db = $this->db->connexion();
    
    $query = "SELECT v.*
              FROM vehicule v
              JOIN avis a ON v.Id = a.VehiculeId
              WHERE a.UtilisateurId = :id_utilisateur AND a.Statut = 'valide' AND a.is_deleted = 0
              ORDER BY a.note DESC
              LIMIT 3";

    $res = $db->prepare($query);
    $res->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
    $res->execute();

    $favVehicules = $res->fetchAll(PDO::FETCH_ASSOC);

    $this->db->deconnexion($db);

    return $favVehicules;
}

public function  get_user($username) {
    $this->db = new ConnexionBdd();
    $cnx = $this->db->connexion();
    $stmt = $cnx->prepare("SELECT * FROM `utilisateur` WHERE Id='$username'");
    $stmt->execute();
    // Do not leave the connection to the database established
    $this->db->deconnexion($cnx);
    return $stmt;
}

}


?>