<?php 

session_start();

if (isset($_POST['logout'])){

    $Nuser = new userpdo();

    $Nuser->disconnect();
}


$index = 0;

// CSS
$boots = "../css/bootstrap.min.css";
$pageCss = "../css/reservation.css";
$header = "../css/header.css";
$footer = "../css/footer.css";

//Liens
$title = " Réservations";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservationform = "reservation-form.php";
$reservation = "reservation.php";
$accueil = "../index.php";

require('../require/html/header.php');
require('../require/php/utilisateurs.php');
require('../require/php/reservations.php');

?>

<main>
<?php

if(isset($_GET)){
    echo '
    <table>
        <thead>
            <th>Hello</th>
        </thead>
        <tr>
            <td>Uh oh</td>
        </tr>
        <tr>
            <td>Uhhhh</td>
        </tr>
    </table>
    ';
}
?>

</main>

<?php require('../require/html/footer.php'); ?>
