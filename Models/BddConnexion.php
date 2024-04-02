<?php
// La classe responsable de se connecter à/deconnecter de la BDD
class ConnexionBdd{
    // Les attributs pour stocker les informations de connexion à la BDD
    private $bdd_host = "localhost"; // Adresse du serveur de la base de données
    private $bdd_user = "root";      // Nom d'utilisateur pour la connexion à la BDD
    private $bdd_pswd = "";          // Mot de passe pour la connexion à la BDD
    private $bdd_name = "tdw";   // Nom de la base de données

    // La méthode qui permet de se connecter à la BDD
    public function connexion(){
        // La connexion peut lancer une exception en cas d'erreur
        try{
            // Création d'une nouvelle instance de la classe PDO pour la connexion à la BDD
            $bdd = new PDO("mysql:host={$this->bdd_host};dbname={$this->bdd_name}", $this->bdd_user, $this->bdd_pswd);
            
            // Configuration du jeu de caractères pour prendre en charge l'UTF-8
            $bdd->query('SET NAMES utf8');
            
            // Configuration du mode pour lancer des exceptions en cas d'erreur
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch(PDOException $ex){
            // Affichage d'un message d'erreur en cas d'échec de la connexion
            printf("Erreur de connexion à la base de données !");
            // Arrêt du script en cas d'échec de la connexion
            exit();
        }
        // Retourne l'objet PDO représentant la connexion à la BDD
        return $bdd;
    }

    // Méthode permettant la déconnexion de la BDD $bdd
    public function deconnexion($bdd){
        // Fermeture de la connexion en définissant l'objet PDO à null
        $bdd = null;
    }

    // Méthode permettant la préparation et l'exécution d'une requête $r via la BDD $bdd
    public function requete($bdd, $r){
        try {
            // Préparation de la requête en utilisant la méthode prepare de l'objet PDO
            $stmt = $bdd->prepare($r);
    
            // Exécution de la requête préparée en utilisant la méthode execute de l'objet PDOStatement
            $stmt->execute();
    
            // Autres traitements si nécessaire
    
            return true;  // Or you can return something else indicating success
        } catch (PDOException $e) {
            // Affiche l'erreur
            echo "Erreur : " . $e->getMessage();
            return false; // Or handle the error in some way
        }
    }
}
?>
