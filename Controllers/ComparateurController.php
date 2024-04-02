<?php
//Appeler le modele
require_once "Models\ComparateurModel.php";
class ComparateurController{
    public function get_marque(){
        $model = new ComparateurModel();
        $res = $model->get_marque();
        return $res;
    }
    public function get_vehicule(){
        $model = new ComparateurModel();
        $res = $model->get_vehicules();
        return $res;
    }
    public function get_marque_id($nom_marque){
        $model = new ComparateurModel();
        $res = $model->get_marque_id($nom_marque);
        return $res;
    }
    public function get_vehicule_id($marque, $modele, $annee, $version){
        $model = new ComparateurModel();
        $res = $model->get_vehicule_id($marque, $modele, $annee, $version);
        return $res;
    }
    public function get_vehicule_details($id){
        $model = new ComparateurModel();
        $res = $model->get_vehicule_details($id);
        return $res;
    }
    public function comparateur_plus_recherche(){
        $model = new ComparateurModel();
        $res = $model->comparateur_plus_recherche();
        return $res;
    }
    

}
?>