<?php 

if (isset($_POST['logout'])){

    $Nuser = new userpdo();

    $Nuser->disconnect();
}

$index = 0;

// CSS
$boots = "../css/bootstrap.min.css";
$pageCss = "../css/inscription.css";
$header = "../css/header.css";
$footer = "../css/footer.css";

//Liens
$title = " Inscription";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservationform = "reservation-form.php";
$reservation = "reservation.php";
$accueil = "../index.php";

require('../require/html/header.php');
require('../require/php/utilisateurs.php');

//PHP

if(isset($_POST['register'])){

    $Nuser = new userpdo();

    $Nuser->register();
    
}

?>
    <main>
        <section class="container-fluid">
            <section class="loginBox">
                <form method="post" action="inscription.php">
                    <section class="inputBox">
                        <label id="label-style" for="login">Votre Login :</label>
                        <input type="text" name="login" placeholder="Votre login" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="password">Votre mot de passe :</label>
                        <input type="password" name="password" placeholder="Votre Mot de Passe" required>
                    </section>
                    <section class="inputBox">
                        <label id="label-style" for="confirm-password">Retapez votre mot de passe :</label>
                        <input type="password" name="confirm-password" placeholder="Retapez votre Mot de Passe" required>
                    </section> 
                    <button type="submit" name="register" class="bouton btn btn-dark">S'inscrire</button>
                </form>
            </section>
        </section>
    </main>

    <?php require('../require/html/footer.php'); ?>
    