<?php 

session_start();

if (isset($_POST['logout'])){

    $Nuser = new userpdo();

    $Nuser->disconnect();
}


$index = 0;

// CSS
$boots = "../css/bootstrap.min.css";
$pageCss = "../css/planning.css";
$header = "../css/header.css";
$footer = "../css/footer.css";

//Liens
$title = " Planning";
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



$calendar = new Event;

?>

<main>
    <section class="container-fluid">
        <table class="planing">
            <thead>
                <tr>
                    <th></th>
                    <th>lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                for($heure = 8 ; $heure <= 18 ; $heure++){

                    echo '<tr></tr>';

                    for($jour = 0 ; $jour <= 5 ; $jour++){

                        if($jour == 0){

                            echo '<td>' .$heure.'h </td>';
                        }
                        else{
                            $calendar->planning($jour,$heure);
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </section>  
</main>
<footer>
</footer>
</body>
</html>

