<?php
// Inclure le modèle
include "Models\MarqueModel.php";
class MarqueController {
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
    public function comparateur_plus_rech($id) {
        $model = new MarqueModel();
        $r = $model->comparateur_plus_rech($id);
        return $r;
    }
}
?>