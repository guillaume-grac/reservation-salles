<?php 


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

$Nuser = new userpdo();

if (isset($_SESSION['login'])){ 
    if(isset($_POST['update'])){
        if(isset($_POST['Nlogin']) && $_POST['Npassword'] === $_POST['NCpassword']){

            $login = htmlspecialchars(trim($_POST['Nlogin']));
            $password = htmlspecialchars(trim($_POST['Npassword'], PASSWORD_BCRYPT));
            $confirm_password = htmlspecialchars(trim($_POST['NCpassword']));


                $crypted = password_hash($password, PASSWORD_BCRYPT);

                $Nuser->update($login, $crypted);
            
            echo 'Utilisateur creer';
        }
    }
}

?>
    <main>
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
    </main>
 