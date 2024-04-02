<?php
require_once "Models/BddConnexion.php";
session_start();
function addNews($img,$title,$content,$imageUrl,$date) {
    $model= new ConnexionBdd();
    $cnx = $model->connexion();
    $q = "INSERT INTO news ( img_news, title, content, imageUrl, date,is_deleted)
      VALUES ( '$img', '$title', '$content', '$imageUrl', '$date','0');";
    $r= $model->requete($cnx,$q);
    $model->deconnexion($cnx);
}
function deleteNews($newsId){
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE news SET is_deleted=1 where Id='$newsId';";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
  return $r; 
}
function updateNews($newsId,$title,$imageUrl,$content,$img_news,$date){
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE news SET title='$title',imageUrl='$imageUrl',content='$content',img_news='$img_news',date='$date' where id='$newsId';";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
  return $r; 
}
function addUser($username,$nom,$prenom,$sexe,$mdp) {
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "INSERT INTO utilisateur (username,Nom,Prenom,Sexe,MotDePasse,isAdmin,valide,is_blocked)
    VALUES ( '$username','$nom','$prenom','$sexe','$mdp', '0','0','0');";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
}
function deleteUser($Id){
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE utilisateur SET is_blocked=1 where Id='$Id';";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
  return $r; 
}
function updateUser($Id){
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE utilisateur SET valide=1 where Id='$Id';";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
  return $r; 
}

function addMarque($nom, $imgMarque, $paysOrigine, $siegeSocial, $anneeCreation) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "INSERT INTO marque (Nom, img_marque, PaysOrigine, SiegeSocial, AnneeCreation,is_deleted)
        VALUES ('$nom', '$imgMarque', '$paysOrigine', '$siegeSocial', '$anneeCreation','0');";
  $r = $model->requete($cnx, $q);
  $model->deconnexion($cnx);
}
function updateMarque($marqueId, $nom, $imgMarque, $paysOrigine, $siegeSocial, $anneeCreation) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "UPDATE marque SET Nom='$nom', img_marque='$imgMarque', PaysOrigine='$paysOrigine', SiegeSocial='$siegeSocial', AnneeCreation='$anneeCreation' WHERE Id='$marqueId';";
  $r = $model->requete($cnx, $q);
  $model->deconnexion($cnx);
  return $r;
}
function deleteMarque($marqueId) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE marque SET is_deleted=1 where Id='$marqueId';";
  $r = $model->requete($cnx, $q);
  $model->deconnexion($cnx);
  return $r;
}
function addVehicule($marqueId, $modele, $version, $annee, $note, $puissance, $consommation, $capacite, $tarifIndicatif, $imageUrl, $pageDetailleeUrl) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "INSERT INTO vehicule (marque_id, modele, version, annee, note, puissance, consommation, capacite, tarif_indicatif, image_url, page_detaillee_url,is_deleted)
        VALUES ('$marqueId', '$modele', '$version', '$annee', '$note', '$puissance', '$consommation', '$capacite', '$tarifIndicatif', '$imageUrl', '$pageDetailleeUrl','0');";
  $r = $model->requete($cnx, $q);
  $model->deconnexion($cnx);
}
function deleteVehicule($vehiculeId) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $q= "UPDATE vehicule SET is_deleted=1 where  Id=$vehiculeId";
  $r = $model->requete($cnx, $q);
  $model->deconnexion($cnx);
  return $r;
}
function updateVehicule( $vehiculeId,$marqueId, $modele, $version, $annee, $note, $puissance, $consommation, $capacite, $tarifIndicatif, $imageUrl, $pageDetailleeUrl) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  
  $q = "UPDATE vehicule SET marque_id='$marqueId', modele='$modele', version='$version', annee='$annee', note='$note', puissance='$puissance', consommation='$consommation', capacite='$capacite', tarif_indicatif='$tarifIndicatif', image_url='$imageUrl', page_detaillee_url='$pageDetailleeUrl' WHERE Id='$vehiculeId';";
  
  $r = $model->requete($cnx, $q);
  
  $model->deconnexion($cnx);
  return $r;
}

function addComparison($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4,$nb) {
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "INSERT INTO comparison (vehicle1Id,vehicle2Id,vehicle3Id,vehicle4Id,nbr_recherche)
    VALUES ('$id_vehicule1', '$id_vehicule2', '$id_vehicule3', '$id_vehicule4','$nb');";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
}
function checkComparison($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();

  $stmt = $cnx->prepare("SELECT COUNT(*) as count FROM comparison 
        WHERE vehicle1Id = '$id_vehicule1' 
        AND vehicle2Id = '$id_vehicule2' 
        AND vehicle3Id = '$id_vehicule3' 
        AND vehicle4Id = '$id_vehicule4'");
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $model->deconnexion($cnx);

  // Si le nombre de lignes trouvées est supérieur à zéro, la comparaison existe
  return $result['count'] > 0;
}
function updateComparaison($id,$nb) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  
  $q = "UPDATE comparison SET nbr_recherche='$nb' WHERE id='$id';";
  
  $r = $model->requete($cnx, $q);
  
  $model->deconnexion($cnx);
  return $r;
}
function get_comparaison_id($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
  $stmt = $cnx->prepare("SELECT id FROM comparison 
  WHERE vehicle1Id = '$id_vehicule1' 
  AND vehicle2Id = '$id_vehicule2' 
  AND vehicle3Id = '$id_vehicule3' 
  AND vehicle4Id = '$id_vehicule4'");
  
  $stmt->execute(); // You need to execute the query before fetching results
  
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Check if $result is false (no rows fetched)
  if ($result === false) {
    // Handle the case where no rows were fetched (perhaps return an error code or false)
    $model->deconnexion($cnx);
    return false;
  }

  $model->deconnexion($cnx);
  return (int)$result['id'];
}

function get_comparaison_nbr($id)
{
  $model = new ConnexionBdd();
  $cnx = $model->connexion();
    $stmt = $cnx->prepare("SELECT nbr_recherche FROM comparison WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $model->deconnexion($cnx);

    // Retourner l'ID de la marque, ou 0 si la marque n'est pas trouvée
    return (int)$result['nbr_recherche'];
}

function addAvis() {
  $model= new ConnexionBdd();
  $cnx = $model->connexion();
  $q = "INSERT INTO comparison (vehicle1Id,vehicle2Id,vehicle3Id,vehicle4Id)
    VALUES ('$id_vehicule1', '$id_vehicule2', '$id_vehicule3', '$id_vehicule4');";
  $r= $model->requete($cnx,$q);
  $model->deconnexion($cnx);
}
function addReview($userRating, $userReview, $userUsername, $vehicleId,$is_marque) {
  $model = new ConnexionBdd();
  $cnx = $model->connexion();

  // Récupérer l'ID de l'utilisateur basé sur le nom d'utilisateur
  $userId = getUserIdByUsername($userUsername, $cnx);

  if ($userId !== null) {
      // Utiliser une requête préparée pour éviter les injections SQL
      $q = "INSERT INTO avis (VehiculeId, UtilisateurId, Commentaire, note,is_marque,is_deleted)
            VALUES (:vehicleId, :userId, :userReview, :userRating, :is_marque,'0')";
      
      $stmt = $cnx->prepare($q);
      $stmt->bindParam(':vehicleId', $vehicleId, PDO::PARAM_INT);
      $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
      $stmt->bindParam(':userReview', $userReview, PDO::PARAM_STR);
      $stmt->bindParam(':userRating', $userRating, PDO::PARAM_INT);
      $stmt->bindParam(':is_marque', $is_marque, PDO::PARAM_INT);


      $stmt->execute();
  } else {
      echo 'Utilisateur non trouvé.';
  }

  $model->deconnexion($cnx);
}

// Fonction pour récupérer l'ID de l'utilisateur basé sur le nom d'utilisateur
function getUserIdByUsername($username, $cnx) {
  $q = "SELECT Id FROM utilisateur WHERE username = :username";
  $stmt = $cnx->prepare($q);
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result !== false && isset($result['Id'])) {
      return $result['Id'];
  } else {
      return null;
  }
}
function validateReview($avisId)
    {
        $model= new ConnexionBdd();
        $cnx = $model->connexion();
        $stmt = $cnx->prepare("UPDATE avis SET Statut = 'valide' WHERE Id = :avisId");
        $stmt->bindParam(':avisId', $avisId, PDO::PARAM_INT);
        $stmt->execute();
        $model->deconnexion($cnx);
    }

function blockReview($avisId)
    {
      $model= new ConnexionBdd();
      $cnx = $model->connexion();
      $stmt = $cnx->prepare("UPDATE avis SET Statut = 'non_valide' WHERE Id = :avisId");
      $stmt->bindParam(':avisId', $avisId, PDO::PARAM_INT);
      $stmt->execute();
      $model->deconnexion($cnx);
    }




?>

