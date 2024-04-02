<?php
header('Content-type: text/html; charset=UTF-8');
require_once "Views/GestionNewsView.php";
require_once "Views/AddNewsView.php";
require_once "Views/ModifyNewsView.php";
require_once "Views/NewsView.php";
require_once "Views/DiapoView.php";
require_once "Views/SignUpView.php";
require_once "Views/GestionUsersView.php";
require_once "Views/LoginView.php";
require_once "Views/GestionMarqueView.php";
require_once "Views/AddMarqueView.php";
require_once "Views/ModifyMarqueView.php";
require_once "Views/GestionVehiculeView.php";
require_once "Views/AddVehiculeView.php";
require_once "Views/ModifyVehiculeView.php";
require_once "Views/ComparateurView.php";
require_once "Views/MarqueView.php";
require_once "Views/AvisView.php";
require_once "Views/profilView.php";
require_once "Views/GestionAvisView.php";

class website
{
    /*********************************** Accueil *******************************/
    //La fonction permettant de generer Le header de la page
    public function header()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <title>Carent</title>
        <meta name='description' content='' />
        <link href='App/acc_css.css' rel='stylesheet' type='text/css'/>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
        </head>";
    }
    public function navbar()
    {
        echo "
         <div class='navbar'>
        <div class='social-icons'>
            <a href='https://www.facebook.com'><img src='App/image/fb.png'></a>
            <a href='https://www.instagram.com'><img src='App/image/insta.png'></a>
            <a href='https://www.twitter.com'><img src='App/image/Twitter.png'></a>
        </div>
        <div class='logo'>
            <img src='App/image/Logo.png'>
        </div>";
        echo"</div>";
    }
    public function menu()
    {
        echo "
        <div class='separer'>
        <div class='container_menu'>
        <ul class='menu'>
        <li><a href='/prj/acceuil'>Accueil</a></li>
        <li><a href='../prj/News'>News</a></li>
        <li><a href='../prj/Comparateur'>Comparateur</a></li>
        <li><a href='../prj/marque.php'>Marque</a></li>
        <li><a href='../prj/Avis'>Avis</a></li>
        <li><a href='../prj/guide_achat'>Guides d'achat</a></li>
        <li><a href='../prj/contact'>Contact</a></li>
    </ul>
    </div>
    <div class='separer'>
</div>";
    }

    public function footer()
    {
        echo "
        <div class='footer-section'>
    <div class='footer-header'>
        <h2><span class='orange-line'>CarComp</span></h2>
        <br>
    </div>
    
    <div class='footer-section'>
        <ul class='menu'>
        <li><a href=''>Accueil</a></li>
        <li><a href=''>News</a></li>
        <li><a href=''>Comparateur</a></li>
        <li><a href=''>Marques</a></li>
        <li><a href=''>Avis</a></li>
        <li><a href=''>Guides d'achat</a></li>
        <li><a href=''>Contact</a></li>
    </ul>
    </div>
    </div>
    ";
    }

        // La fonction permettant de generer le code source de la page Accueil
        public function build_accueil() {
            // Declaration du menu, diapo, categorie, et footer
            $news = new DiapoView();
            $zone2 = new ComparateurView();
            $zone1 = new MarqueView();
        
            echo "
            <!DOCTYPE html>
            <html>
            ";
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                        <a href='../prj/profil'>profil</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
        
            $news->news();
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";
            $zone1->zone_1();
            echo "<div class='space'></div>"; 
            echo "<div class='space'></div>"; 
            echo "<div class='space'></div>"; 
            $zone2->zone2();
            echo "<div class='space'></div>"; 
            $zone2->zone3();
            echo "<div class='space'></div>"; 
            echo "<div class='space'></div>"; 

            $this->footer();
        
            echo "
            </body>
            </html>
            ";
        }
        
        // La fonction permettant de generer le code source de la page Comparateur
        public function build_Comparateur(){
            //Declaration du menu, diapo, categorie, et footer
            $zone= new ComparateurView();  
            echo"<!DOCTYPE html>
            <html>";

            //Appeler le header
            session_start(); // Start the session
            $this->header();
            
            echo"<body>";
            //Construire le navbar
            $this->navbar();
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            $this->menu();
            echo "<div class='space'></div>"; 
            $zone->zone2();
            echo "<div class='space'></div>"; 
            echo "<div class='space'></div>"; 

            $this->footer();
            echo"</body></html>";
        }
    /*********************************** Gestion News *******************************/


    public function header_gestion_news()
    {
        echo"<head>
            <meta charset='UTF-8'>
            <title>Carent</title>
             <meta name='description' content='' />
             <link href='App/gestion_news.css' rel='stylesheet' type='text/css'/>
             </head>";
    }
    public function build_gestion_news(){
            $news= new GestionNewsView();  
            //Appeler le header
            $this->header_gestion_news();
            echo"<body>";
            echo"<br>";
            $news->news();
            echo"</body></html>";
    }
    /*********************************** ajouter News *******************************/
    public function header_add_news()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/addNews.css' rel='stylesheet' type='text/css'/>
        <title>Add News</title>
    </head>";
    }
    public function build_add_news(){
        $news= new AddNewsView();  
        //Appeler le header
        $this->header_add_news();
        echo"<body>";
        echo"<br>";
        $news->news();
        echo"</body></html>";
}
    /*********************************** Modifier News *******************************/
    public function header_update_news()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/addNews.css' rel='stylesheet' type='text/css'/>
        <title>Add News</title>
    </head>";
    }
    public function build_update_news($newsid){
        $news= new ModifyNewsView();  
        //Appeler le header
        $this->header_update_news();
        echo"<body>";
        echo"<br>";
        $news->news($newsid);
        echo"</body></html>";
}
    /*********************************** Page News *******************************/
    public function header_news()
    {
        echo"<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/News.css' rel='stylesheet' type='text/css'/>
        <title> News</title>
    </head>";
    }
    public function build_news(){
        $news= new NewsView();  
        //Appeler le header
        echo "
            <!DOCTYPE html>
            <html>
            ";
            $this->header_news();
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
            
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";   
            $news->news();
            echo "<div class='space'></div>"; 

            $this->footer();
        
            echo "
            </body>
            </html>
            ";
}
/*********************************** Page News details*******************************/
public function header_news_details()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/newsDetails.css' rel='stylesheet' type='text/css'/>
    <title> News</title>
</head>";
}
public function build_news_details($id){
    $news= new NewsView();  
    //Appeler le header
    echo "
        <!DOCTYPE html>
        <html>
        ";
        $this->header_news();
    
        // Appeler le header
        session_start(); // Start the session
        $this->header();
    
        echo "
        <body>
        ";
    
        // Construire le navbar
        $this->navbar();
        
    
        if (isset($_SESSION['username'])) {
            echo "<div class='logout'>
                    Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                  </div>";
        }
        if (!isset($_SESSION['username'])) {
            echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
        }
        echo "<div class='space'></div>"; 
        $this->menu();
        echo "<div class='space'></div>";   
        $news-> news_details($id);
        echo "<div class='space'></div>"; 

        $this->footer();
    
        echo "
        </body>
        </html>
        ";
}
/*********************************** sign up *******************************/
public function header_sign_up()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/SignUp.css' rel='stylesheet' type='text/css'/>
    <title>Add User</title>
</head>";
}
public function build_sign_up(){
    $sign= new SignUpView();  
    //Appeler le header
    $this->header_sign_up();
    echo"<body>";
    echo"<br>";
    $sign->SignUp();
    echo"</body></html>";
}
/*********************************** Gestion users *******************************/


public function header_gestion_users()
{
    echo"<head>
        <meta charset='UTF-8'>
        <title>Carent</title>
         <meta name='description' content='' />
         <link href='App/gestion_users.css' rel='stylesheet' type='text/css'/>
         </head>";
}
public function build_gestion_users(){
        $user= new GestionUsersView();  
        //Appeler le header
        $this->header_gestion_users();
        echo"<body>";
        echo"<br>";
        $user->user();
        echo"</body></html>";
}
/*********************************** login *******************************/
public function header_login()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/login.css' rel='stylesheet' type='text/css'/>
    <title>login</title>
</head>";
}
public function build_login(){
    $sign= new LoginView();  
    //Appeler le header
    $this->header_login();
    echo"<body>";
    echo"<br>";
    $sign->login();
    echo"</body></html>";
}
/*********************************** Admin *******************************/
public function header_Admin()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/admin.css' rel='stylesheet' type='text/css'/>
    <title>login</title>
</head>";
}
public function admin()
    {
        echo "
        <header>
        <h1>Welcome, Admin!</h1>
    </header>

    <nav>
        <ul>
            <li><a href='../prj/gestion_marques'>Gestion des Véhicules</a></li>
            <li><a href='../prj/gestion_avis'>Gestion des Avis</a></li>
            <li><a href='../prj/gestion_news'>Gestion des News</a></li>
            <li><a href='../prj/gestion_users'>Gestion des Utilisateurs</a></li>
            <li><a href='#settings'>Paramètres</a></li>
        </ul>
    </nav>

    <footer>
        <p>&copy; 2024 CARENT. All rights reserved.</p>
    </footer>
</body>
    ";
    }

        // La fonction permettant de generer le code source de la page Admin
        public function build_admin(){
            //Declaration du menu, diapo, categorie, et footer
            echo"<!DOCTYPE html>
            <html>";

            //Appeler le header
            $this->header_Admin();
            echo"<body>";
            //Construire le navbar
            $this->admin();
            echo"</body></html>";
        }
/*********************************** Contact *******************************/
public function contact() {
    echo '<div class="contact-container">';
    echo '<h2>Nous Contacter</h2>';

    // Formulaire de contact
    echo '<form action="../prj/send_message" method="post">';
    echo '<label for="name">Nom :</label>';
    echo '<input type="text" id="name" name="name" required>';
    echo '<label for="email">Email :</label>';
    echo '<input type="email" id="email" name="email" required>';
    echo '<label for="message">Message :</label>';
    echo '<textarea id="message" name="message" required></textarea>';
    echo '<button type="submit">Envoyer</button>';
    echo '</form>';

    // Informations de contact
    echo '<div class="contact-info">';
    echo '<h3>Coordonnées</h3>';
    echo '<p>Adresse: Alger</p>';
    echo '<p>Email: jl_arab@esi.dz</p>';
    echo '<p>Téléphone: 0788990011</p>';
    echo '</div>';

    // Liens vers les réseaux sociaux
    echo '<div class="social-links">';
    echo '<h3>Suivez-nous sur les réseaux sociaux</h3>';
    echo '<a href="www.facebook.com" target="_blank">Facebook</a>';
    echo '<a href="https://twitter.com" target="_blank">Twitter</a>';
    echo '<a href="www.instagram.com" target="_blank">Instagram</a>';
    echo '</div>';

    echo '</div>';
}

public function header_Contact()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/Contact.css' rel='stylesheet' type='text/css'/>
    <title>Contact</title>
</head>";
}
 // La fonction permettant de generer le code source de la page Contact
 public function build_contact() {
    echo "
    <!DOCTYPE html>
    <html>
    ";

    // Appeler le header
    session_start(); // Start the session
    $this->header_Contact();

    echo "
    <body>
    ";

    // Construire le navbar
    $this->navbar();

    if (isset($_SESSION['username'])) {
        echo "<div class='logout'>
                Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
              </div>";
    }
    if (!isset($_SESSION['username'])) {
        echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
    }
    echo "<div class='space'></div>"; 
    $this->menu();
    echo "<div class='space'></div>"; 
    $this->contact();
    echo "<div class='space'></div>"; 

    $this->footer();

    echo "
    </body>
    </html>
    ";
}



//
/*********************************** Gestion users *******************************/


public function header_gestion_marques()
{
    echo"<head>
        <meta charset='UTF-8'>
        <title>CarComp</title>
         <meta name='description' content='' />
         <link href='App/gestion_marques.css' rel='stylesheet' type='text/css'/>
         </head>";
}
public function build_gestion_marques(){
        $marque= new GestionMarqueView();  
        //Appeler le header
        $this->header_gestion_marques();
        echo"<body>";
        echo"<br>";
        $marque->marque();
        echo"</body></html>";
}
/*********************************** ajouter Marque *******************************/
public function header_add_marque()
{
    echo"<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='App/addMarque.css' rel='stylesheet' type='text/css'/>
    <title>CarComp</title>
</head>";
}
public function build_add_marque(){
    $marque= new AddMarqueView();  
    //Appeler le header
    $this->header_add_marque();
    echo"<body>";
    echo"<br>";
    $marque->marque();
    echo"</body></html>";
}

/*********************************** Modifier Marque *******************************/
public function header_update_marque()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/addMarque.css' rel='stylesheet' type='text/css'/>
        <title>Modify Marque</title>
    </head>";
}

public function build_update_marque($marqueId)
{
    $marqueView = new ModifyMarqueView();
    
    // Appeler le header
    $this->header_update_marque();
    
    echo "<body>";
    echo "<br>";
    
    // Appeler la vue de modification de marque
    $marqueView->marque($marqueId);
    
    echo "</body></html>";
}
/*********************************** Gestion vehicule *******************************/


public function header_gestion_vehicule()
{
    echo"<head>
        <meta charset='UTF-8'>
        <title>CarComp</title>
         <meta name='description' content='' />
         <link href='App/gestion_vehicule.css' rel='stylesheet' type='text/css'/>
         </head>";
}
public function build_gestion_vehicule($id){
        $vehicule= new GestionvehiculeView();  
        //Appeler le header
        $this->header_gestion_vehicule();
        echo"<body>";
        echo"<br>";
        $vehicule->vehicule($id);
        echo"</body></html>";
}
/*********************************** Ajouter Vehicule *******************************/
public function header_add_vehicule()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/addVehicule.css' rel='stylesheet' type='text/css'/>
        <title>Add Vehicule</title>
    </head>";
}

public function build_add_vehicule($id)
{
    $vehicule = new AddVehiculeView();
    // Appeler le header
    $this->header_add_vehicule();
    echo "<body>";
    echo "<br>";
    $vehicule->vehicule($id);
    echo "</body></html>";
}
/*********************************** Modifier Marque *******************************/
public function header_update_vehicule()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/addVehicule.css' rel='stylesheet' type='text/css'/>
        <title>Modify Marque</title>
    </head>";
}

public function build_update_vehicule($Id)
{
    $marqueView = new ModifyVehiculeView();
    
    // Appeler le header
    $this->header_update_vehicule();
    
    echo "<body>";
    echo "<br>";
    $marqueView->vehicule($Id);
    
    echo "</body></html>";
}
/*********************************** marques *******************************/
public function header_marque()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/marque.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>Marques</title>
        <script>
        function showDetails(marque_Id) {
            // Use jQuery AJAX for the request
            $.ajax({
                type: 'POST',
                url: 'apirouteController.php',
                data: { marque_Id: marque_Id },
                success: function(response) {
                    $('#detailsSection').html(response);
                },
                error: function(xhr, status, error) {                  
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
        
        </script>

    </head>";
}
public function build_marque(){
    $marque= new MarqueView();  
    // Appeler le header
    $this->header_marque();
    echo "
            <!DOCTYPE html>
            <html>
            ";
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";
            $marque->marque();
            echo "<div class='space'></div>"; 

            echo "
            </body>
            </html>
            ";
}

/*********************************** voiture *******************************/
public function header_voiture()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/voiture.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>Voiture</title>

    </head>";
}
public function build_voiture($id){
    $marque= new MarqueView();  
    // Appeler le header
    $this->header_voiture();
    echo "
            <!DOCTYPE html>
            <html>
            ";
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";
            $marque->get_vehicule_details($id);
            echo "<div class='space'></div>"; 
            $this->footer();
            echo "
            </body>
            </html>
            ";
}
public function header_voiture_avis()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/avis_voiture.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>Voiture</title>

    </head>";
}
public function build_voiture_avis($id){
    $marque= new MarqueView();  
    // Appeler le header
    $this->header_voiture_avis();
    
    echo "<body>";
    echo "<br>";
    $marque->get_vehicule_reviews($id);
    echo "</body></html>";
}

/*********************************** marques *******************************/
public function header_Avis()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/marque.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>Avis</title>
        <script>
        function showDetails(marque__Id) {
            // Use jQuery AJAX for the request
            $.ajax({
                type: 'POST',
                url: 'apirouteController.php',
                data: { marque__Id: marque__Id },
                success: function(response) {
                    $('#detailsSection').html(response);
                },
                error: function(xhr, status, error) {                  
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
        
        </script>

    </head>";
}
public function build_Avis(){
    $marque= new AvisView();  
    // Appeler le header
    $this->header_Avis();
    echo "
            <!DOCTYPE html>
            <html>
            ";
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";
            $marque->marque();
            echo "<div class='space'></div>"; 

            echo "
            </body>
            </html>
            ";
}
//vehicule_reviews.css
/*********************************** voiture *******************************/
public function header_voiture_reviews()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/vehicule_reviews.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>Voiture</title>

    </head>";
}
public function build_voiture_reviews($id){
    $marque= new AvisView();  
    // Appeler le header
    $this->header_voiture_reviews();
    echo "
            <!DOCTYPE html>
            <html>
            ";
        
            // Appeler le header
            session_start(); // Start the session
            $this->header();
        
            echo "
            <body>
            ";
        
            // Construire le navbar
            $this->navbar();
        
            if (isset($_SESSION['username'])) {
                echo "<div class='logout'>
                        Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
                      </div>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='login-link'><a href='../prj/login'>Se connecter</a></li>";
            }
            echo "<div class='space'></div>"; 
            $this->menu();
            echo "<div class='space'></div>";
            $marque->get_vehicule_details($id);
            echo "<div class='space'></div>"; 
            $this->footer();
            echo "
            </body>
            </html>
            ";
}
/*********************************** profil *******************************/
public function header_profil()
{
    echo "<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='App/profil.css' rel='stylesheet' type='text/css'/>
        <script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
        <title>profil</title>

    </head>";
}
public function getUserId($username){
    $this->db = new ConnexionBdd();
    $cnx = $this->db->connexion();
    $stmt = $cnx->prepare("SELECT id FROM `utilisateur` WHERE username='$username'");
    $stmt->execute();
    //Ne pas laisser la cnx a la BDD etablie
    $this->db->deconnexion($cnx);
    return $stmt->fetchColumn();;
  
  }
// La fonction permettant de generer le code source de la page Comparateur
public function build_profil(){
    //Declaration du menu, diapo, categorie, et footer
    $profil= new ProfilView();  
    echo"<!DOCTYPE html>
    <html>";

    //Appeler le header
    session_start(); // Start the session
    $this->header_profil();
    
    echo"<body>";
    //Construire le navbar
    $this->navbar();
    if (isset($_SESSION['username'])) {
        echo "<div class='logout'>
                Welcome " . $_SESSION['username'] . " <a href='../prj/logout'>Logout</a> 
              </div>";
              $this->menu();
              echo "<div class='space'></div>"; 
              $profil->profil($this->getUserId($_SESSION['username']));
              echo "<div class='space'></div>"; 
    }
    
    $this->footer();
    echo"</body></html>";
}

/*********************************** Gestion Avis *******************************/


public function header_gestion_avis()
{
    echo"<head>
        <meta charset='UTF-8'>
        <title>CarComp</title>
         <meta name='description' content='' />
         <link href='App/gestion_avis.css' rel='stylesheet' type='text/css'/>
         <script>
         document.addEventListener('DOMContentLoaded', function() {
         var table = document.querySelector('.gestion_avis table');

        //Récupérez toutes les lignes sauf la première (en-têtes)
         var rows = Array.from(table.querySelectorAll('tr:not(:first-child)'));
         // Trier les lignes par le statut (colonne index 4)
         rows.sort(function(a, b) {
         var statutA = a.cells[4].textContent.trim();
         var statutB = b.cells[4].textContent.trim();
         return statutA.localeCompare(statutB);
          });

         // Ajouter les lignes triées à la table
        rows.forEach(function(row) {
        table.appendChild(row);
        });
        });
        </script>
         </head>";
}
public function build_gestion_avis(){
        $avis= new GestionAvisView();  
        //Appeler le header
        $this->header_gestion_avis();
        echo"<body>";
        echo"<br>";
        $avis->avis();
        echo"</body></html>";
}

}
?>