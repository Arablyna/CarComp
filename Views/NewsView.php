<?php
require_once "Models\NewsModel.php";
require_once "Controllers\NewsController.php";
class NewsView
{
    public function news()
{
  

    //Le contrôleur pour récupérer les données de la bdd
    $controller = new NewsController();
    $res = $controller->get_news();

    //Pour chaque news récupérée de la bdd, on l'affiche
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='news-item'>
            <h4>{$row['date']}</h4>
            <h2>{$row['title']}</h2>
            <a href='NewsDetails?id={$row['id']}'><img src='{$row['img_news']}' alt='Image de l'article 1'></a>
        </div>
        ";
    }
}
public function news_details($id)
{
  

    //Le contrôleur pour récupérer les données de la bdd
    $controller = new NewsController();
    $res = $controller->get_news_details($id);

    //Pour chaque news récupérée de la bdd, on l'affiche
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='news-item'>
            <h4>{$row['date']}</h4>
            <h2>{$row['title']}</h2>
            <a href='{$row['imageUrl']}'><img src='{$row['img_news']}' alt='Image de l'article 1'></a>
            <p>{$row['content']}</p>
            <a href='{$row['imageUrl']}'><h5>reference</h5></a>
        </div>
        ";
    }
}


}