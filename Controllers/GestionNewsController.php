<?php
//Appeler le modele
require_once "Models\GestionNewsModel.php";
class GestionNewsController{
    public function get_news(){
        $model = new GestionNewsModel();
        $res = $model->get_news();
        return $res;
    }
}
?>

