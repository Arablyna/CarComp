<?php
//Appeler le modele
require_once "Models\GestionAvisModel.php";
class GestionAvisController{
    public function get_avis(){
        $model = new GestionAvisModel();
        $res = $model->get_avis();
        return $res;
    }
    public function getUsername($id){
        $model = new GestionAvisModel();
        $res = $model->getUsername($id);
        return $res;
    }
    public function getVehiculeModel($id){
        $model = new GestionAvisModel();
        $res = $model->getVehiculeModel($id);
        return $res;
    }
}
?>