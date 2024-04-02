<?php
//on utilise require car le script ne peut pas s'executer s'il y a une erreur de connexion
require_once "BddConnexion.php";
class ComparateurModel{
    private $db;
    //Methode permettant la recuperation des news de la bdd
    public function get_marque(){
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM marque where is_deleted=0 ");
        $stmt->execute();
        //Ne pas laisser la cnx a la BDD etablie
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_vehicules()
    {
        $this->db = new ConnexionBdd();
        $cnx = $this->db->connexion();
        $stmt = $cnx->prepare("SELECT * FROM vehicule  ");
        $stmt->execute();
        $this->db->deconnexion($cnx);
        return $stmt;
    }
    public function get_vehicule_id($marque, $modele, $annee, $version)
{
    $this->db = new ConnexionBdd();
    $cnx = $this->db->connexion();

    // Construire la requête SQL
    $sql = "SELECT Id FROM vehicule WHERE marque_id = '$marque' AND modele =  '$modele' AND annee = $annee and is_deleted=0 ";

    // Préparer la requête
    $stmt = $cnx->prepare($sql);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer l'ID
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fermer la connexion
    $this->db->deconnexion($cnx);

    // Retourner l'ID du véhicule ou 0 si non trouvé
    return ($result !== false) ? $result['Id'] : 0;
}




public function get_marque_id($nom_marque)
{
    $this->db = new ConnexionBdd();
    $cnx = $this->db->connexion();

    $stmt = $cnx->prepare("SELECT Id FROM marque WHERE Nom = :nom_marque and is_deleted=0");
    $stmt->bindParam(':nom_marque', $nom_marque);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fermer la connexion
    $this->db->deconnexion($cnx);

    // Retourner l'ID de la marque, ou 0 si la marque n'est pas trouvée
    return ($result !== false) ? (int)$result['Id'] : 0;
}
public function get_vehicule_details($id) {
    $this->db = new ConnexionBdd();
    $cnx = $this->db->connexion();
    $stmt = $cnx->prepare("SELECT * FROM `vehicule` WHERE Id='$id' ");
    $stmt->execute();
    // Do not leave the connection to the database established
    $this->db->deconnexion($cnx);
    return $stmt;
}
public function comparateur_plus_recherche() {
    $this->db = new ConnexionBdd();
    $db = $this->db->connexion();

    $query = "SELECT comparison.*
              FROM comparison 
              WHERE vehicle3Id = 0 AND vehicle4Id = 0 
              ORDER BY comparison.nbr_recherche DESC 
              LIMIT 3";

    $res = $db->prepare($query);
    $res->execute();

    $topComparisons = $res->fetchAll(PDO::FETCH_ASSOC);

    $this->db->deconnexion($db);

    return $topComparisons;
}









}

?>