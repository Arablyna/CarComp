<?php
//Appeler le modele
require_once "apirouteModel.php";
require_once "App\App.php";
require_once "Controllers\ComparateurController.php";
require_once "Views\ComparateurView.php";
if (isset($_POST['newssubmit'])) {
     // Form submitted, process the data and add news
            $imgNews = $_FILES['img_news']['name'];
            $imgNewsTemp = $_FILES['img_news']['tmp_name'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $imageUrl = $_POST['imageUrl'];
            $date = $_POST['date'];
            $uploadDir = 'uploads/'; 
            $imgNewsPath = $uploadDir . $imgNews;
            move_uploaded_file($imgNewsTemp, $imgNewsPath);
            addNews($imgNewsPath,$title,$content,$imageUrl,$date);
            header("location:/prj/gestion_news.php");
            
            exit;
}
if (isset($_POST['deletenews'])){
     $newsid=$_POST['deletenews'];
     deleteNews($newsid);
     header("location:/prj/gestion_news.php");
 }
 if (isset($_POST['modifynews'])){
     $newsid=$_POST['modifynews'];
     $news= new website();
     $news->build_update_news($newsid);
     
 }
 if (isset($_POST['modifynewssubmit'])){
     $id=$_POST['modifynewssubmit'];
     $imgNews = $_FILES['img_news']['name'];
     $imgNewsTemp = $_FILES['img_news']['tmp_name'];
     $title = $_POST['title'];
     $content = $_POST['content'];
     $imageUrl = $_POST['imageUrl'];
     $date = $_POST['date'];
     $uploadDir = 'uploads/'; 
     $imgNewsPath = $uploadDir . $imgNews;
     move_uploaded_file($imgNewsTemp, $imgNewsPath);
            // Call the model method to add news
     updateNews($id,$title,$imageUrl,$content,$imgNewsPath,$date);
     header("location:/prj/gestion_news.php");
            // Redirect to the news index page
            
     exit;
 }

 if (isset($_POST['usersubmit'])) {
    // Form submitted, process the data and add news
           $user = $_POST['username'];
           $nom = $_POST['nom'];
           $prenom = $_POST['prenom'];
           $sexe = $_POST['sexe'];
           $motDePasse = $_POST['motDePasse'];
           addUser($user,$nom ,$prenom,$sexe,$motDePasse);
           echo"added";
           header("location:/prj/login.php");
           
           exit;
}

if (isset($_POST['deleteUser'])){
       $id=$_POST['deleteUser'];
       deleteUser($id);
       header("location:/prj/gestion_users.php");
   }

   if (isset($_POST['ValidateUser'])){
       $id=$_POST['ValidateUser'];
       updateUser($id);
       header("location:/prj/gestion_users.php");
   }
   if (isset($_POST['marquesubmit'])) {
    // Form submitted, process the data and add marque
    $imgMarque = $_FILES['img_marque']['name'];
    $imgMarqueTemp = $_FILES['img_marque']['tmp_name'];
    $nom = $_POST['nom'];
    $paysOrigine = $_POST['paysOrigine'];
    $siegeSocial = $_POST['siegeSocial'];
    $anneeCreation = $_POST['anneeCreation'];
    $uploadDir = 'uploads/'; 
    $imgMarquePath = $uploadDir . $imgMarque;
    move_uploaded_file($imgMarqueTemp, $imgMarquePath);
    addMarque($nom, $imgMarquePath, $paysOrigine, $siegeSocial, $anneeCreation);
    header("location:/prj/gestion_marques.php");
    exit;
}
if (isset($_POST['modifymarquesubmit'])) {
    $id = $_POST['modifymarquesubmit'];
    $imgMarque = $_FILES['img_marque']['name'];
    $imgMarqueTemp = $_FILES['img_marque']['tmp_name'];
    $nom = $_POST['nom'];
    $paysOrigine = $_POST['paysOrigine'];
    $siegeSocial = $_POST['siegeSocial'];
    $anneeCreation = $_POST['anneeCreation'];
    $uploadDir = 'uploads/';
    $imgMarquePath = $uploadDir . $imgMarque;
    move_uploaded_file($imgMarqueTemp, $imgMarquePath);
    // Appeler la méthode du modèle pour mettre à jour la marque
    updateMarque($id, $nom, $imgMarquePath, $paysOrigine, $siegeSocial, $anneeCreation);
    header("location:/prj/gestion_marques.php");
    exit;
}
if (isset($_POST['modifymarque'])) {
    $marqueId = $_POST['modifymarque'];
    $website = new Website(); 
    $website->build_update_marque($marqueId);
}
if (isset($_POST['deletemarque'])) {
    $marqueId = $_POST['deletemarque'];
    deleteMarque($marqueId);
    header("location:/prj/gestion_marques.php");
  }
  if (isset($_POST['marqueId'])) {
    $marqueId = $_POST['marqueId'];
    $website = new Website(); 
    $website->build_gestion_vehicule($marqueId);
  }
  if (isset($_POST['addVehicule'])) {
    // Form submitted, process the data and add marque
    $marqueId = $_POST['addVehicule'];
    $website = new Website(); 
    $website->build_add_vehicule($marqueId);
}
if (isset($_POST['vehiculesubmit'])) {
    $marqueId = $_POST['marque_id'];
    $modele = $_POST['modele'];
    $version = $_POST['version'];
    $annee = $_POST['annee'];
    $note = $_POST['note'];
    $puissance = $_POST['puissance'];
    $consommation = $_POST['consommation'];
    $capacite = $_POST['capacite'];
    $tarifIndicatif = $_POST['tarif_indicatif'];
    $imageUrl = $_FILES['image_url']['name'];
    $imageUrlTemp = $_FILES['image_url']['tmp_name'];
    $pageDetailleeUrl = $_POST['page_detaillee_url'];

    $uploadDir = 'uploads/';
    $imageUrlPath = $uploadDir . $imageUrl;
    move_uploaded_file($imageUrlTemp, $imageUrlPath);

    // Appeler la méthode du modèle pour ajouter le véhicule
    addVehicule($marqueId, $modele, $version, $annee, $note, $puissance, $consommation, $capacite, $tarifIndicatif, $imageUrlPath, $pageDetailleeUrl);
    header("location:/prj/gestion_marques.php");
    exit;
}
if (isset($_POST['deletevehicule'])) {
    $vehiculeId = $_POST['deletevehicule'];
    deleteVehicule($vehiculeId);
    header("location:/prj/gestion_marques.php");
    exit;
}
if (isset($_POST['modifyvehiculesubmit'])) {
    $vehiculeId=$_POST['id'];
    $marqueId = $_POST['marque_id'];
    $modele = $_POST['modele'];
    $version = $_POST['version'];
    $annee = $_POST['annee'];
    $note = $_POST['note'];
    $puissance = $_POST['puissance'];
    $consommation = $_POST['consommation'];
    $capacite = $_POST['capacite'];
    $tarifIndicatif = $_POST['tarif_indicatif'];
    $imageUrl = $_FILES['image_url']['name'];
    $imageUrlTemp = $_FILES['image_url']['tmp_name'];
    $pageDetailleeUrl = $_POST['page_detaillee_url'];

    $uploadDir = 'uploads/';
    $imageUrlPath = $uploadDir . $imageUrl;
    move_uploaded_file($imageUrlTemp, $imageUrlPath);

    // Call the method to add the vehicle to the database
    updateVehicule($vehiculeId,$marqueId, $modele, $version, $annee, $note, $puissance, $consommation, $capacite, $tarifIndicatif, $imageUrlPath, $pageDetailleeUrl);
    header("location:/prj/gestion_marques.php");
    exit;
}

if (isset($_POST['modifyvehicule'])) {
    $Id = $_POST['modifyvehicule'];
    $website = new Website(); 
    $website->build_update_vehicule($Id);
}
// Vérifier si le formulaire a été soumis
// apirouteController.php

if(isset($_POST['CompareSubmit'])) {
    $comp = new ComparateurController(); 
    $count_valid_ids = 0; // Initialize a counter for valid IDs

    // Récupérer les valeurs des champs pour chaque véhicule
    for ($i = 1; $i <= 4; $i++) {
        ${'marque'.$i} = isset($_POST['marque'.$i]) ? $_POST['marque'.$i] : '';
        ${'modele'.$i} = isset($_POST['modele'.$i]) ? $_POST['modele'.$i] : '';
        ${'annee'.$i} = isset($_POST['annee'.$i]) ? $_POST['annee'.$i] : '';
        ${'version'.$i} = isset($_POST['version'.$i]) ? $_POST['version'.$i] : '';

        // Récupérer l'ID de la marque
        ${'id_marque'.$i} = $comp->get_marque_id(${'marque'.$i});

        // Récupérer l'ID du véhicule
        ${'id_vehicule'.$i} = $comp->get_vehicule_id(${'id_marque'.$i}, ${'modele'.$i}, (int)${'annee'.$i}, ${'version'.$i});

        // Increment the counter if the ID is greater than 0
        if (${'id_vehicule'.$i} > 0) {
            $count_valid_ids++;
        }
    }

    // Check if more than 2 IDs are greater than 0
    if ($count_valid_ids > 1) {
        $comp1 = new ComparateurView();
        $comp1->tableauComparatif($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4);
        $stmt = checkComparison($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4);
        if($stmt<1){
            addComparison($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4,'1');
        } else{
            //recuperer l ancien nbr_recherche
            $id=get_comparaison_id($id_vehicule1, $id_vehicule2, $id_vehicule3, $id_vehicule4);
            echo $id;
            $nb_rech=get_comparaison_nbr($id)+1;
            echo $nb_rech;
            updateComparaison($id,$nb_rech);

        }

       
    } else {
        echo "Vous devez remplir au moins 2 formulaires"; // Less than or equal to 2 valid IDs
    }
}
//Compare_vehicule_Submit(comparer un vehicule specifique a d autres)
if(isset($_POST['Compare_vehicule_Submit'])) {
    $comp = new ComparateurController(); 
    $count_valid_ids = 1; // Initialize a counter for valid IDs
    $ID=$_POST['id'];

    // Récupérer les valeurs des champs pour chaque véhicule
    for ($i = 1; $i <= 3; $i++) {
        ${'marque'.$i} = isset($_POST['marque'.$i]) ? $_POST['marque'.$i] : '';
        ${'modele'.$i} = isset($_POST['modele'.$i]) ? $_POST['modele'.$i] : '';
        ${'annee'.$i} = isset($_POST['annee'.$i]) ? $_POST['annee'.$i] : '';
        ${'version'.$i} = isset($_POST['version'.$i]) ? $_POST['version'.$i] : '';

        // Récupérer l'ID de la marque
        ${'id_marque'.$i} = $comp->get_marque_id(${'marque'.$i});

        // Récupérer l'ID du véhicule
        ${'id_vehicule'.$i} = $comp->get_vehicule_id(${'id_marque'.$i}, ${'modele'.$i}, (int)${'annee'.$i}, ${'version'.$i});

        // Increment the counter if the ID is greater than 0
        if (${'id_vehicule'.$i} > 0) {
            $count_valid_ids++;
        }
    }

    // Check if more than 2 IDs are greater than 0
    if ($count_valid_ids > 1) {
        $comp1 = new ComparateurView();
        $comp1->tableauComparatif($ID,$id_vehicule1, $id_vehicule2, $id_vehicule3);
        $stmt = checkComparison($ID,$id_vehicule1, $id_vehicule2, $id_vehicule3);
        if($stmt<1){
            addComparison($ID,$id_vehicule1, $id_vehicule2, $id_vehicule3,'1');
        } else{
            //recuperer l ancien nbr_recherche
            $id=get_comparaison_id($ID,$id_vehicule1, $id_vehicule2, $id_vehicule3);
            echo $id;
            $nb_rech=get_comparaison_nbr($id)+1;
            echo $nb_rech;
            updateComparaison($id,$nb_rech);

        }

       
    } else {
        echo "Vous devez remplir au moins 2 formulaires"; // Less than or equal to 2 valid IDs
    }
}
//
if (isset($_POST['marque_Id'])) {
    $marqueId = $_POST['marque_Id'];

    // Include necessary controllers
    require_once "Controllers\MarqueController.php";

    $controller = new MarqueController();
    
    // Get marque details
    $marqueDetails = $controller->get_marque($marqueId);
    $marque = $marqueDetails->fetch();

    if ($marque) {
        echo  $marqueId;
        echo '<div class="details-content">';
        echo '<p>Nom: ' . $marque['Nom'] . '</p>';
        echo '<p>Pays d\'origine: ' . $marque['PaysOrigine'] . '</p>';
        echo '<p>Siège social: ' . $marque['SiegeSocial'] . '</p>';
        echo '<p>Année de création: ' . $marque['AnneeCreation'] . '</p>';

        // Get voitures for the marque
        $voitures = $controller->get_vehicule($marqueId);

        if ($voitures->rowCount() > 0) {
            // Display dropdown list of cars
            echo '<h3>Liste déroulante des voitures</h3>';
            echo '<form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm("Do you really want to submit the form?");">';
            echo '<select id="carDropdown" name="selectedCar">'; // Corrected name attribute
            echo '<option value="" disabled selected>Sélectionnez une voiture</option>';
            while ($voiture = $voitures->fetch()) {
                echo '<option value="' . $voiture['Id'] . '">' . $voiture['modele'] . '</option>';
            }
            echo '</select>';
        
            // Add a button to navigate to the detailed page
            echo '<button type="submit" name="vehicule_submit" class="btn btn-primary btn-lg btn-block">voir details</button>';
            echo '</form>';
        } else {
            echo '<p>Aucune voiture disponible pour cette marque.</p>';
        }

        echo '</div>';
    } else {
        echo '<p>Marque non trouvée.</p>';
    }
}
if (isset($_POST['marque__Id'])) {
    $marqueId = $_POST['marque__Id'];

    // Include necessary controllers
    require_once "Controllers\MarqueController.php";

    $controller = new MarqueController();
    
    // Get marque details
    $marqueDetails = $controller->get_marque($marqueId);
    $marque = $marqueDetails->fetch();

    if ($marque) {
        echo  $marqueId;
        echo '<div class="details-content">';
        echo '<p>Nom: ' . $marque['Nom'] . '</p>';
        echo '<p>Pays d\'origine: ' . $marque['PaysOrigine'] . '</p>';
        echo '<p>Siège social: ' . $marque['SiegeSocial'] . '</p>';
        echo '<p>Année de création: ' . $marque['AnneeCreation'] . '</p>';

        // Get voitures for the marque
        $voitures = $controller->get_vehicule($marqueId);

        if ($voitures->rowCount() > 0) {
            // Display dropdown list of cars
            echo '<h3>Liste déroulante des voitures</h3>';
            echo '<form action="./apirouteController.php" method="post" enctype="multipart/form-data" onsubmit="return confirm("Do you really want to submit the form?");">';
            echo '<select id="carDropdown" name="selectedCar">'; // Corrected name attribute
            echo '<option value="" disabled selected>Sélectionnez une voiture</option>';
            while ($voiture = $voitures->fetch()) {
                echo '<option value="' . $voiture['Id'] . '">' . $voiture['modele'] . '</option>';
            }
            echo '</select>';
        
            // Add a button to navigate to the detailed page
            echo '<button type="submit" name="vehicule_avis_submit" class="btn btn-primary btn-lg btn-block">voir details</button>';
            echo '</form>';
        } else {
            echo '<p>Aucune voiture disponible pour cette marque.</p>';
        }

        echo '</div>';
    } else {
        echo '<p>Marque non trouvée.</p>';
    }
}

if (isset($_POST['vehicule_submit'])) {
    $selectedCarId = $_POST['selectedCar'];
    header("location: /prj/vehiculeDetails?id=$selectedCarId");
    //$news= new website();
    //$news->build_voiture($selectedCarId);
}
if (isset($_POST['vehicule_avis_submit'])) {
    $selectedCarId = $_POST['selectedCar'];
    header("location: /prj/vehiculeReviews?id=$selectedCarId");
    //$news= new website();
    //$news->build_voiture($selectedCarId);
}
if (isset($_POST['review_submit'])) {
    if (isset($_SESSION['username'])) {
    $userRating = $_POST['user_rating'];
    $userReview = $_POST['user_review']; 
    $CarId = $_POST['vehicle_id']; 
    $user =  $_SESSION['username'];
    addReview($userRating, $userReview, $user, $CarId,0);
    echo "votre commentaire est soumis";
    echo"<br>";
    echo"<a href='marque'>cliquer ici</a>";
    }
    else{
        echo "vous devez vous connnecter ";
    }
    
}
if (isset($_POST['review_marque_submit'])) {
    if (isset($_SESSION['username'])) {
    $userRating = $_POST['user_rating'];
    $userReview = $_POST['user_review']; 
    $CarId = $_POST['vehicle_id']; 
    $user =  $_SESSION['username'];
    addReview($userRating, $userReview, $user, $CarId,1);
    echo "votre commentaire est soumis";
    echo"<br>";
    echo"<a href='marque'>cliquer ici</a>";
    }
    else{
        echo "vous devez vous connnecter ";
    }
    
}
if (isset($_POST['validateAvis'])){
    $id=$_POST['validateAvis'];
    validateReview($id);
    header("location:/prj/gestion_avis.php");
}

if (isset($_POST['blockAvis'])){
    $id=$_POST['blockAvis'];
    blockReview($id);
    header("location:/prj/gestion_avis.php");
}




?>





