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
    <table>
        <thead>
            <tr>
                <th>Titre :</th><th>Description :</th><th>Date et heure de début :</th><th>Date et heure de fin :</th><th>Nom :</th>
            </tr> 
        </thead> 
        <tbody>
            <tr>

            <?php

                $reservations = new Event();
                $contain = $reservations->affichageContenu();

                foreach ($contain as $result){
                    foreach ($result as $key => $value){
                        echo '<td>' .$value.'</td>';
                    }
                }


            ?>
            
            <td><?php echo ucfirst($_SESSION['login']) ?></td>
            </tr>
        </tbody>  
    </table> 
</main>

<?php require('../require/html/footer.php'); ?>
