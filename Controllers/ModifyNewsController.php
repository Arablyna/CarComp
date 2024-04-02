<?php
//Appeler le modele
include "Models\ModifyNewsModel.php";

class ModifyNewsController{
    public function getNews($id){
        $model=new ModifyNewsModel();
        $r=$model->get_news($id);
        return $r;  
    }
}
?>