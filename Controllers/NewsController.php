<?php
//Appeler le modele
require_once "Models\NewsModel.php";
class NewsController{
    public function get_news(){
        $model = new NewsModel();
        $res = $model->get_news();
        return $res;
    }
    public function get_news_details($id){
        $model = new NewsModel();
        $res = $model->get_news_details($id);
        return $res;
    }
}
?>