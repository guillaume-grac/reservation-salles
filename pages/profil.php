<?php 

session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: connexion.php');
        exit();
    }

$index = 0;

// CSS
$boots = "../css/bootstrap.min.css";
$pageCss = "../css/profil.css";
$header = "../css/header.css";
$footer = "../css/footer.css";

//Liens
$title = " Profil";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservationform = "reservation-form.php";
$reservation = "reservation.php";
$accueil = "../index.php";

require('../require/html/header.php');
require('../require/html/footer.php');
require('../require/php/classes.php');

//PHP

if(isset($_POST['update'])){

    $Nuser = new userpdo();

    $Nuser->update();
    
}

$Nuser = new userpdo();



if(isset($_SESSION['id'])){

    echo '<main>
        <section class="container-fluid">
            <section class="loginBox">
                <h1>Modifier votre profil</h1>
                <form method="post" action="profil.php">
                    <section class="inputBox">
                        <label id="label-style" for="Nlogin">Votre nouveau Login :</label>
                        <input type="text" name="Nlogin" placeholder="Votre login" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="Npassword">Votre nouveau mot de passe :</label>
                        <input type="password" name="Npassword" placeholder="Votre Mot de Passe" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="NCpassword">Confirmez votre nouveau mot de passe :</label>
                        <input type="password" name="NCpassword" placeholder="Votre Mot de Passe" required>
                    </section>
                    <button type="submit" name="update" class="bouton btn btn-dark">Confirmer</button>
                </form>
            </section>
        </section>
    </main>';
}

else{

    echo'<section class="alert alert-danger text-center alert-co" role="alert"> Vous devez être connecté pour pouvoir voir et modifier votre profil ! <br>
            <a href="connexion.php" class="alert-link">Connectez-vous ici</a>
        </section>';
}

?>
    
 