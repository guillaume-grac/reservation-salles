<?php 

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    header('location: pages/connexion.php');
    exit();
}

$index = 1;

//Titre
$title = "Loc'Sea | Accueil";

//CSS
$boots = "css/bootstrap.min.css";
$pageCss = "css/index.css";
$header = "css/header.css";
$footer = "css/footer.css";

//Liens
$title ="Accueil";
$inscription = "pages/inscription.php";
$connexion = "pages/connexion.php";
$profil = "pages/profil.php";
$planning = "pages/planning.php";
$reservationform = "pages/reservation-form.php";
$reservation = "pages/reservation.php";
$accueil = "index.php";

require('require/html/header.php');
require('require/html/footer.php');

?>

<main>
    <section>
        <section class="main-content container-fluid">
        <h1><u>Avec Loc'Sea, vivez l'expèrience la plus immersive !</u></h1>
        <p>Loc'Sea vous propose la locations d'une salle de luxe totalement immergée, hors du commun.<br>
        La salle est composée de 2 tunnels et un espace dit "miroir" au centre. <br>
        N'hésitez plus, reservez votre salle et vivez une experience intense et merveilleuse.</p>
        <section class="photos">
            <img class="img1" src="images/salle-bg.jpg" alt="salle 1">
            <img class="img1" src="images/salle-bg4.jpg" alt="salle 2">
            <img class="img1" src="images/salle-bg5.jpg" alt="salle 3">
        </section>
    </section>
</main>
