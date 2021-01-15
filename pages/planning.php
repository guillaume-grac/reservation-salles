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
                <tr>
                    <td>8H à 9H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>9h à 10H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                 <tr>
                    <td>10H à 11H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov">aaa</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                 </tr>  
                <tr>
                    <td>11H à 12H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>12H à 13H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>13H à 14H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>14H à 15H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>15H à 16H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>16H à 17H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>17H à 18H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
                <tr>
                    <td>18H à 19H</td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                    <td class="td-hoov"></td>
                </tr>
            </tbody>
        </table>
    </section>
</main>

<?php require('../require/html/footer.php'); ?>
