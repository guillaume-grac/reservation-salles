<?php

if($index==1){
    echo'
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>' . $title . '</title>
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
                            <li class="nav-item"><a class="nav-link" href=' . $inscription . '>| <i class="fas fa-users"></i> Inscription</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $connexion . '>| <i class="fas fa-user-check"></i> Connexion</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $profil . '>| <i class="fas fa-user-cog"></i> Profil</a></li>
                        </ul>
                        <a class="navbar-brand title-princ" href=' . $accueil . '><b>Loc\'Sea</b></a>
                        <ul class="navbar-nav ml-auto salles">
                            <li class="nav-item"><a class="nav-link" href=' . $planning . '>| <i class="far fa-calendar-alt"></i> Planning</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $reservationform . '>| <i class="far fa-calendar-plus"></i> Reserver</a></li>
                            <li class="nav-item"><a class="nav-link" href=' . $reservation . '>| <i class="far fa-calendar-check"></i> Les réservations</a></li>
                        </ul>
                    </section>
                </nav>
            </div>
        </header>';
}

else{
    echo'
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Loc\'Sea | Accueil</title>
        <link rel="stylesheet" href=' . $boots . '>
        <link rel="stylesheet" href=' . $header . '>
        <link rel="stylesheet" href=' . $footer . '>
        <link rel="stylesheet" href=' . $pageCss.  '>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
    <body>
        <header>
            <nav class="mb-1 navbar navbar-expand-lg lighten-1">
                <section class="collapse navbar-collapse" id="navbarSupportedContent-555">
                    <ul class="navbar-nav membres">
                        <li class="nav-item"><a class="nav-link" href=' . $inscription . '>| <i class="fas fa-users"></i> Inscription</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $connexion . '>| <i class="fas fa-user-check"></i> Connexion</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $profil . '>| <i class="fas fa-user-cog"></i> Profil</a></li>
                    </ul>
                    <a class="navbar-brand title-princ" href=' . $accueil . '><b>Loc\'Sea</b></a>
                    <ul class="navbar-nav ml-auto salles">
                        <li class="nav-item"><a class="nav-link" href=' . $planning . '>| <i class="far fa-calendar-alt"></i> Planning</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $reservationform . '>| <i class="far fa-calendar-plus"></i> Reserver</a></li>
                        <li class="nav-item"><a class="nav-link" href=' . $reservation . '>| <i class="far fa-calendar-check"></i> Les réservations</a></li>
                    </ul>
                </section>
            </nav>
        </header>';

}
?>
