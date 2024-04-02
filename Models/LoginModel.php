<?php

require_once "BddConnexion.php";  

class LoginModel {
    private $db;
  
    public function Login($username,$MotDePasse){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT count(*) FROM `utilisateur` WHERE username='$username' AND MotDePasse='$MotDePasse' and is_blocked=0 and valide=1");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt->fetchColumn();;
    }
    public function ifAdmin($username,$MotDePasse){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT isAdmin FROM `utilisateur` WHERE username='$username' AND MotDePasse='$MotDePasse'");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt->fetchColumn();;
    }
    public function getUserId($username){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT id FROM `utilisateur` WHERE username='$username' ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt->fetchColumn();;

    }

}
?>