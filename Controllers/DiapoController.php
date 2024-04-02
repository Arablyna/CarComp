<?php
//Appeler le modele
require_once "Models\DiapoModel.php";
class DiapoController{
    public function get_news(){
        $model = new GestionNewsModel();
        $res = $model->get_news();
        return $res;
    }
}
?>