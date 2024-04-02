<?php
// Inclure le modèle
include "Models\AvisModel.php";
class Avis_Controller {
    public function get_marque($id) {
        $model = new MarqueModel();
        $r = $model->get_marque($id);
        return $r;
    }
    public function get_vehicule($id) {
        $model = new MarqueModel();
        $r = $model->get_vehicule($id);
        return $r;
    }
    public function get_marques() {
        $model = new MarqueModel();
        $r = $model->get_marques();
        return $r;
    }
    public function get_vehicule_details($id) {
        $model = new MarqueModel();
        $r = $model->get_vehicule($id);
        return $r;
    }
    public function get_top_user_reviews($id_vehicule) {
        $model = new MarqueModel();
        $r = $model->get_top_user_reviews($id_vehicule);
        return $r;
    }
    public function get_all_reviews($id_vehicule) {
        $model = new MarqueModel();
        $r = $model->get_all_reviews($id_vehicule);
        return $r;
    }
    public function get_paginated_reviews($id_vehicule, $page, $perPage){
        $model = new AvisModel();
        $r = $model->get_paginated_reviews($id_vehicule, $page, $perPage);
        return $r;
    }
    //get_fav_vehicule_users($id_utilisateur)
    public function get_fav_vehicule_users($id_utilisateur){
        $model = new AvisModel();
        $r = $model->get_fav_vehicule_users($id_utilisateur);
        return $r;
    }
    public function get_user($username) {
        $model = new AvisModel();
        $r = $model->get_user($username);
        return $r;
    }
}
?>