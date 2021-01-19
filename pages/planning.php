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

//Utilisation de la méthode classique après plusieurs essais non concluants en classes et poo : 

$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$requete = "SELECT * FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);


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
                <?php include("table.php"); ?>
            </tbody>
        </table>
    </section>  
</main>
<footer>
</footer>
    <script src="../js/fullcalendar/core/main.js"></script>
    <script src="../js/fullcalendar/daygrid/main.js"></script>
    <script src="../js/fullcalendar/timegrid/main.js"></script>
    <script src="../js/script.js"></script> 
</body>
</html>

