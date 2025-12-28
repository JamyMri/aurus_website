<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ////////////////////// CSS ////////////////////// -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu_style.css">
    <link rel="shortcut icon" href="../ressources/images/aurus_favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- ////////////////////// IMPORTATION POLICE ALFACAD (FOOTER) ////////////////////// -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- ////////////////////// TITRE DE LA PAGE ////////////////////// -->
    <title>© Aurus 2025</title>
</head>
<body class = "d-flex flex-column min-vh-100">
    <a href="/index.html">
        <img id="logo" src="/ressources/images/aurus_logo.png" alt="logo aurus">
    </a>
    <div class = "usericon">
        <a href="/p/login.php">
            <img id="usericon_placement"src="/ressources/images/user_icon.png" alt="icône utilisateur"> 
        </a>
        
    </div>
    <!-- ////////////////////// MENU //////////////////////  -->
    <div class="button">
        <input type="checkbox" id="menu-toggle" hidden>
        <label for="menu-toggle" class="bar_icon">☰</label>
        <h3 id="w-text">Louez l'excellence</h3>
        <div class="parentmenu">
            <div class="menu">       
                <ul class="choix">
                    <a href="/p/berlines.html">
                        <img id="berline-logo" src="/ressources/images/berline.png" alt="berline_logo">
                        <li id="menu_text">Berlines</li>
                    </a>
                    <a href="/p/citadines.html">
                        <img id="citadine-logo" src="/ressources/images/citadine.png" alt="citadine_logo">
                        <li id="menu_text">Citadines</li>
                    </a>
                    <a href="/p/suv.html">
                        <img id="suv-logo" src="/ressources/images/suv.png" alt="suv_logo">
                        <li id="menu_text">SUV</li>
                    </a>
                    <a href="/p/utilitaires.html">
                        <img id="utilitaires-logo" src="/ressources/images/utilitaire.png" alt="utilitaires_logo">
                        <li id="menu_text">Utilitaires</li>
                    </a>
                </ul> 
            </div>    
        </div>
    </div>

    <!-- ////////////////////// FOOTER ////////////////////////////// -->
    <footer class="footer-aurus mt-auto w-100">
        <div class="container">
            <div class="row g-4">
                <!--  ////////////////////// Badges App Store et Google Play ////////////////////// -->
                <div class="col-12 col-md-6 col-lg-3 order-1">
                    <div class="app-badges">
                        <img id="appstore-logo" src="/ressources/images/appstore_logo.png" alt="App Store Logo">
                        <img id="playstore-logo" src="/ressources/images/googlestore-logo.png" alt="Google Play Store">
                    </div>
                </div>
                
                <!-- ////////////////////// COLONNE NOS SERVICES ////////////////////// -->
                <div class="col-6 col-md-6 col-lg-2 order-2 footer-section">
                    <h5 id="nos-services">NOS SERVICES</h5>
                    <ul>
                        <li><a href="#" id="loc-car-text">LOCATION VÉHICULES</a></li>
                        <li><a href="#" id="loc-utilities-text">LOCATION UTILITAIRES</a></li>
                        <li><a href="#" id="our-agency-text">NOS AGENCES</a></li>
                    </ul>
                </div>
                
                <!-- ////////////////////// Colonne ASSISTANCE ////////////////////// -->
                <div class="col-6 col-md-6 col-lg-2 order-3 footer-section">
                    <h5 id="assistance-text">ASSISTANCE</h5>
                    <ul>
                        <li><a href="#" id="help-contact-text">AIDE ET CONTACT</a></li>
                        <li><a href="#" id="cgv-cgu-text">CGV / CGU</a></li>
                    </ul>
                </div>
                
                <!-- ////////////////////// Réseaux sociaux ////////////////////// -->
                <div class="col-12 col-md-12 col-lg-3 order-5 text-center text-lg-end">
                    <div class="social-icons">
                        <a href="https://x.com" target="_blank">
                            <img id="twitter-logo" src="/ressources/images/twitter-logo.png" alt="Logo Twitter">
                        </a>
                        <a href="https://instagram.com" target="_blank">
                            <img id="instagram-logo" src="/ressources/images/instagram-logo.png" alt="Instagram Logo">
                        </a>
                        <a href="https://linkedin.com" target="_blank">
                            <img id="linkedin-logo" src="/ressources/images/linkedin-logo.png" alt="LinkedIn Logo">
                        </a>
                    </div>
                </div>
                
            </div>
            
            <!-- ////////////////////// Copyright ////////////////////// -->
            <div class="footer-bottom">
                <p id="ptit_texte_en_bas" class="mb-0">© Aurus 2025</p>
            </div>
        </div>
    </footer>
    

    
<!-- ////////////////////// BOOTSTRAP ////////////////////// -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>