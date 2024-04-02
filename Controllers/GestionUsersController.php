<?php
//Appeler le modele
require_once "Models\GestionUsersModel.php";
class GestionUsersController{
    public function get_users(){
        $model = new GestionUsersModel();
        $res = $model->get_users();
        return $res;
    }
}
?>