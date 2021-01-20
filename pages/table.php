<?php

// Fonction qui relie ma bdd et mes données à mon tableau en méthode classique (sans utilisé la POO)

function isdateok($heurecasebegin, $connexion, $lecturebdd, $jour){

    $requeteisokdate = "SELECT * FROM reservations WHERE WEEK(debut) = WEEK(CURDATE()) AND (\"$heurecasebegin\" BETWEEN DATE_FORMAT(debut, \"%T\") AND DATE_FORMAT(fin, \"%T\")) AND (\"$jour\" BETWEEN DATE_FORMAT(debut, \"%W\") AND DATE_FORMAT(fin, \"%W\"))";

    $queryisokdate = mysqli_query($connexion, $requeteisokdate);
    $resultatisokdate = mysqli_fetch_all($queryisokdate);

    if (!empty($resultatisokdate)){
        return true;
    }
}

//Affichage du tableau

$i = 0;
$j = 0;

while ($i < 11){
    
    if ($i == 0){
        $heured = "08:00:00";
        $heuref = "09:00:00";
    }
    if ($i == 1){
        $heured = "09:00:00";
        $heuref = "10:00:00";
    }
    if ($i == 2){
        $heured = "10:00:00";
        $heuref = "11:00:00";
    }
    if ($i == 3){
        $heured = "11:00:00";
        $heuref = "12:00:00";
    }
    if ($i == 4){
        $heured = "12:00:00";
        $heuref = "13:00:00";
    }
    if ($i == 5){
        $heured = "13:00:00";
        $heuref = "14:00:00";
    }
    if ($i == 6){
        $heured = "14:00:00";
        $heuref = "15:00:00";
    }
    if ($i == 7){
        $heured = "15:00:00";
        $heuref = "16:00:00";
    }
    if ($i == 8){
        $heured = "16:00:00";
        $heuref = "17:00:00";
    }
    if ($i == 9){
        $heured = "17:00:00";
        $heuref = "18:00:00";
    }
    if ($i == 10){
        $heured = "18:00:00";
        $heuref = "19:00:00";
    }

    echo '<tr>';

    while ($j < 6){

        if ($j == 1){
            $jour = "Monday";
        }
        if ($j == 2) {
            $jour = "Tuesday";
        }
        if ($j == 3) {
            $jour = "Wednesday";
        }
        if ($j == 4) {
            $jour = "Thursday";
        }
        if ($j == 5) {
            $jour = "Friday";
        }

        if ($j == 0) {

            echo'<td>';


            if ($i == 0){
                echo "08h00 - 09h00";
            } 
            elseif ($i == 1){
                echo "09h00 - 10h00";
            } 
            elseif ($i == 2){
                echo "10h00 - 11h00";
            } 
            elseif ($i == 3){
                echo "11h00 - 12h00";
            } 
            elseif ($i == 4){
                echo "12h00 - 13h00";
            } 
            elseif ($i == 5){
                echo "13h00 - 14h00";
            } 
            elseif ($i == 6){
                echo "14h00 - 15h00";
            } 
            elseif ($i == 7){
                echo "15h00 - 16h00";
            } 
            elseif ($i == 8){
                echo "16h00 - 17h00";
            } 
            elseif ($i == 9){
                echo "17h00 - 18h00";
            } 
            elseif ($i == 10){
                echo "18h00 - 19h00";
            }
        }

        echo'</td>';

        if ($j > 0){
                            
            $m = 0;
                    
            while ($m < 6){

                if ($j == $m){

                    $l = 0;
                        
                    while ($l < 11){
                                            
                        if ($i == $l) {

                            $isokevent = isdateok($heured, $connexion, $resultat, $jour);

                            if ($isokevent == true){

                                $requeteevent = "SELECT login, titre, reservations.id FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE (\"$heured\" BETWEEN DATE_FORMAT(debut, \"%T\") AND DATE_FORMAT(fin, \"%T\")) AND (\"$heuref\" BETWEEN DATE_FORMAT(debut, \"%T\") AND DATE_FORMAT(fin, \"%T\")) AND DATE_FORMAT(debut, \"%W\")=\"$jour\" AND WEEK(debut) = WEEK(CURDATE()) OR DATE_FORMAT(fin, \"%T\")=\"$heuref\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\" AND WEEK(debut) = WEEK(CURDATE())";
                                $queryevent = mysqli_query($connexion, $requeteevent);
                                $resultatevent = mysqli_fetch_all($queryevent);
                                                    
                                if (!empty($resultatevent)){

                                    $idevent = $resultatevent[0][2];

                                    if(isset($_SESSION['login'])){

                                        echo "<td><a class=\"lien-event\" href=\"reservation.php?id=$idevent\"><div>" . ucfirst($resultatevent[0][1]) . "<br />De : " . ucfirst($resultatevent[0][0]) . "<br /></div></a></td>";
                                    }
                                    else{
                                        echo "<td><div>" . ucfirst($resultatevent[0][1]) . "<br />De : " . ucfirst($resultatevent[0][0]) . "<br /></div></td>";
                                    }
                                }
                                else{
                                    echo "<td class='libre'>Crénaux disponible</td>";
                                }
                            } 
                            else{
                                    echo "<td class='libre'>Crénaux disponible</td>";
                            }
                                
                            unset($isokevent);

                        }              
                        $l++;
                    }
                }
                $m++;
            }
        }
        $j++;
    }
    $j = 0;
    $i++;
}

?>