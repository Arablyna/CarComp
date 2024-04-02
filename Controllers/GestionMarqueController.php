<?php
//Appeler le modele
require_once "Models\GestionMarqueModel.php";
class GestionMarqueController{
    public function get_marque(){
        $model = new GestionMarqueModel();
        $res = $model->get_marque();
        return $res;
    }
}
?>