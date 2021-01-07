<?php 

session_start();

if (isset($_POST['logout'])){

    $Nuser = new userpdo();

    $Nuser->disconnect();
}


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
                    <input type="datetime-local" name="date1" required>
                </section> 
                <button type="submit" name="register" class="bouton btn btn-dark">S'inscrire</button>
            </form>
        </section>
    </section>
</main>