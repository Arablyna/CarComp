<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "BddConnexion.php";
class NewsModel{
    private $db;
    //Methode permettant la recuperation des news de la bdd
    public function get_news(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM news where is_deleted=0 ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_news_details($id) {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM `news` WHERE Id='$id' and is_deleted=0");
        $stmt->execute();
        // Ne pas laisser la connexion à la BDD établie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
}

?>