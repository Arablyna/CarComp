<?php
require_once "Models\GestionNewsModel.php";
require_once "Controllers\GestionNewsController.php";
class GestionNewsView
{
    public function news()
    {
        echo "<br>
        <div class='gestion_news'>
            <table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>";
        //Le contrôleur pour récupérer les données de la bdd
        $controller = new GestionNewsController();
        $res = $controller->get_news();
        //Pour chaque news récupérée de la bdd, on l'affiche
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td><img src='{$row['img_news']}' alt='News Image' width='50'></td>
                <td>{$row['title']}</td>
                <td>{$row['content']}</td>
                <td>{$row['date']}</td>
                <td>
                    <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer cette nouvelle ?\")'>
                        <input type='hidden' name='deletenews' value='{$row['id']}' >
                        <button type='submit'>Supprimer la nouvelle</button>
                    </form>
                </td>
                <td>
                    <form action='./apirouteController.php' method='post' onsubmit='return confirm(\"Êtes-vous sûr de vouloir modifier cette nouvelle ?\")'>
                        <input type='hidden' name='modifynews' value='{$row['id']}' >
                        <button type='submit'>Modifier la nouvelle</button>
                    </form>
                </td>                  
            </tr>";
            
        }
        echo "</table><form action='./controllers/apirouteController.php' method='post' name='addnewsForm'>
        <button onclick='.' name='addnewsForm'><a href='/prj/addNews.php' class='button-link'>Ajouter News</a></button>
        </form></div>";
    }
}