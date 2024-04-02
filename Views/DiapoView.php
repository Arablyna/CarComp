<?php
require_once "Models\NewsModel.php";
require_once "Controllers\NewsController.php";

class DiapoView
{
    public function news()
    {
        echo "<div class='container'>";
        
        // Display the slideshow container
        echo "<div class='slideshow-container'>";
        
        // Le contrôleur pour récupérer les données de la bdd
        $controller = new NewsController();
        $res = $controller->get_news();
        
        // Pour chaque news récupérée de la bdd, on l'affiche
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <div class='mySlides'>
                <a href='{$row['imageUrl']}' target='_blank'><img src='{$row['img_news']}' ></a>
            </div>";
        }
        
        // Boutons de navigation du diaporama
        echo "<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
        echo "<a class='next' onclick='plusSlides(1)'>&#10095;</a>";
        
        echo "</div>";  // Fermeture de la div slideshow-container
        
        echo "</div>";  // Fermeture de la div container
        echo"<script src='script.js'></script>";


        // JavaScript for the slideshow
        echo "
        <script>
            let slideIndex = 1;
            
            function showSlides(n) {
                let i;
                const slides = document.getElementsByClassName('mySlides');
                
                if (n > slides.length) {
                    slideIndex = 1;
                }
                
                if (n < 1) {
                    slideIndex = slides.length;
                }
                
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = 'none';
                }
                
                slides[slideIndex - 1].style.display = 'block';
            }

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            // Démarrez le diaporama automatiquement toutes les 5 secondes
            setInterval(function () {
                plusSlides(1);
            }, 5000);

            // Affichez la première image au chargement de la page
            showSlides(slideIndex);
        </script>";
        ;
    }
}
?>
