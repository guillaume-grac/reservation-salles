<?php

if($index==1){
    echo'
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Loc\'Sea | ' . $title . '</title>
        <link rel="stylesheet" href=' . $boots . '>
        <link rel="stylesheet" href=' . $pageCss . '>
        <link rel="stylesheet" href=' . $header . '>
        <link rel="stylesheet" href=' . $footer . '>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
    <body>
        <header>
            <div class="header-anim">
                <nav class="mb-1 navbar navbar-expand-lg lighten-1">
                    <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                        <ul class="navbar-nav membres">
                            <li class="nav-item"><a class="nav-link" href=' . $accueil . '>| <i class="fas fa-home"></i> Accueil</a></li>';
                            if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href=' . $inscription . '>| <i class="fas fa-users"></i> Inscription</a></li>';}
                            if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href=' . $connexion . '>| <i class="fas fa-user-check"></i> Connexion</a></li>';}
                            if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href=' . $profil . '>| <i class="fas fa-user-cog"></i> Profil</a></li>';}
                            if (isset($_SESSION['login'])){ echo '<li><form method="POST" action="index.php"><button type="submit" class="btn btn-info" name="logout" title="Déconnexion"><i class="fas fa-power-off"></i></button></form></li>';}
                            if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link"> Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '</a></li>';}
                            echo'
                        </ul>
                        <ul class="navbar-nav ml-auto salles">
                            <li class="nav-item"><a class="nav-link" href=' . $planning . '>| <i class="far fa-calendar-alt"></i> Planning</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $reservationform . '>| <i class="far fa-calendar-plus"></i> Reserver</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $reservation . '>| <i class="far fa-calendar-check"></i> Les réservations</a></li>
                        </ul>
                    </section>
                </nav>
                <a class="navbar-brand title-princ" href=' . $accueil . '><b>Loc\'Sea</b></a>
            </div>
        </header>';
}

else{
    echo'
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Loc\'Sea |' . $title . '</title>
        <link rel="stylesheet" href=' . $boots . '>
        <link rel="stylesheet" href=' . $header . '>
        <link rel="stylesheet" href=' . $footer . '>
        <link rel="stylesheet" href=' . $pageCss.  '>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
    <body>
        <header class= "header2">
            <nav class="mb-1 navbar navbar-expand-lg lighten-1">
                <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                    <ul class="navbar-nav membres">
                        <li class="nav-item"><a class="nav-link" href=' . $accueil . '>| <i class="fas fa-home"></i> Accueil</a></li>';
                        if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link"  href=' . $inscription . '>| <i class="fas fa-users"></i> Inscription</a></li>';}
                        if (!isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link"  href=' . $connexion . '>| <i class="fas fa-user-check"></i> Connexion</a></li>';}
                        if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link" href=' . $profil . '>| <i class="fas fa-user-cog"></i> Profil</a></li>';}
                        if (isset($_SESSION['login'])){ echo '<li><form method="POST" action="../index.php"><button type="submit" class="btn btn-info" name="logout" title="Déconnexion"><i class="fas fa-power-off"></i></button></form></li>';}
                        if (isset($_SESSION['login'])){ echo '<li class="nav-item"><a class="nav-link">Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '</a></li>';}
                        echo'
                    </ul>
                    <ul class="navbar-nav ml-auto salles">
                        <li class="nav-item"><a class="nav-link" href=' . $planning . '>| <i class="far fa-calendar-alt"></i> Planning</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $reservationform . '>| <i class="far fa-calendar-plus"></i> Reserver</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $reservation . '>| <i class="far fa-calendar-check"></i> Les réservations</a></li>
                    </ul>
                </section>
            </nav>
            <a class="navbar-brand title-princ" href=' . $accueil . '><b>Loc\'Sea</b></a>
        </header>';

}
?>
