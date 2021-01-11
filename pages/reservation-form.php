<?php 

session_start();

$index = 0;

// CSS
$boots = "../css/bootstrap.min.css";
$pageCss = "../css/reservation-form.css";
$header = "../css/header.css";
$footer = "../css/footer.css";

//Liens
$title = " Formulaire de réservation";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservationform = "reservation-form.php";
$reservation = "reservation.php";
$accueil = "../index.php";

require('../require/html/header.php');
require('../require/html/footer.php');
require('../require/php/utilisateurs.php');
require('../require/php/reservations.php');

//PHP

if (isset($_POST['logout'])){

    $Nuser = new userpdo();

    $Nuser->disconnect();
}

if(isset($_POST['reservation'])){

    $reservations = new Event();

    $reservations->reservation();
    
}

?>

<main>
    <section class="container-fluid">
        <section class="loginBox">
            <h1>Réserver une salle</h1>
            <form method="post" action="reservation-form.php">
                <section class="inputBox">
                    <label id="label-style" for="titre">Titre de la réservation :</label>
                    <input type="text" name="titre" placeholder="Votre réservation" required>
                    <label id="label-style" for="description">Description :</label>
                    <input type="text" name="description" placeholder="Description de la réservation" required>
                    <label id="label-style" for="date1">Date de début :</label>
                    <input type="datetime-local" name="date1" required>
                    <label id="label-style" for="date1">Date de fin :</label>
                    <input type="datetime-local" name="date2" required>
                </section> 
                <button type="submit" name="reservation" class="bouton btn btn-dark">Réserver</button>
            </form>
        </section>
    </section>
</main>