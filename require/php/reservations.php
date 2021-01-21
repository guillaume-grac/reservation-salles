<?php 

require_once('Modele.php');

class Event extends Modele{

    public function reservation(){

        if(isset($_POST['reservation'])){

            $titre = htmlspecialchars(trim($_POST['titre']));
            $description = htmlspecialchars(trim($_POST['description']));
            $Ddate = $_POST['date1'];
            $Fdate = $_POST['date2'];
            $id_user = $_SESSION['id'];

            $d = new DateTime($Ddate);
            $d2 = new DateTime($Fdate);

            $diff = $d -> diff($d2);
            $diffStr = $diff -> format('%H:%i:%s');

            if($d -> format('w') == 6 || $d -> format('w') == 0 && $d2 -> format('w') == 6 || $d2 -> format('w') == 0){
                
                echo '<section class="alert alert-danger text-center" role="alert"><b>Attention !</b> Les réservations se font <b>uniquement du lundi au vendredi</b>.</section>';
               
            }
            elseif ($diffStr != '01:0:0'){
                echo '<section class="alert alert-danger text-center" role="alert"><b>Attention !</b> Vous pouvez réservez uniquement pour 1 heure.</section>';
            }
            elseif($d -> format('H:i:s') < '08:00:00' || $d -> format('H:i:s') > '19:00:00' && $d2 -> format('H:i:s') < '08:00:00' || $d2 -> format('H:i:s') > '19:00:00'){
                echo '<section class="alert alert-danger text-center" role="alert"><b>Attention !</b> Vous pouvez uniquement réserver de 8H00 à 19H00.</section>';
            }
            else{ 
                
                $statement = $this->db->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
                    
                $statement->execute([
                "titre"=>$titre,
                "description"=>$description,
                "debut"=>$Ddate,
                "fin"=>$Fdate,
                "id_utilisateur"=>$id_user
                ]);

                echo '<section class="alert alert-success text-center" role="alert"><b>Réservation éffectuée</b></section>'; 
            }
        }
    }

    public function affichageContenu(){

        $id = $_GET['id'];

        $affichage2 = $this->db->prepare("SELECT titre, description, debut, fin FROM reservations WHERE id = :id");

        $affichage2->execute(["id"=>$id]);

        $result2= $affichage2->fetchAll(PDO::FETCH_ASSOC);

        return $result2;
        
    }

    public function calend(){

        $requete = $this->db->prepare("SELECT * FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    }


//'SELECT * FROM reservations WHERE WEEK(debut) = WEEK(CURDATE()) AND ("08:00:00" BETWEEN DATE_FORMAT(debut, "%T") AND DATE_FORMAT(fin, "%T")) AND ("Wednesday" BETWEEN DATE_FORMAT(debut, "%W") AND DATE_FORMAT(fin, "%W"))' (length=217)
//SELECT * FROM reservations WHERE WEEK(debut) = WEEK(CURDATE()) AND (11 BETWEEN DATE_FORMAT(debut, %T) AND DATE_FORMAT(fin, %T)) AND ('Monday' BETWEEN DATE_FORMAT(debut, %W) AND DATE_FORMAT(fin, %W))
    public function isdateok($heurecasebegin, $jour){

        $query = "SELECT * FROM reservations WHERE WEEK(debut) = WEEK(CURDATE()) AND (:heurecasebegin BETWEEN DATE_FORMAT(debut,\"%T\") AND DATE_FORMAT(fin, \"%T\")) AND (:jour BETWEEN DATE_FORMAT(debut, \"%W\") AND DATE_FORMAT(fin, \"%W\"))";

        $requeteisokdate = $this->db->prepare($query);
        $requeteisokdate->bindParam(':heurecasebegin', $heurecasebegin, PDO::PARAM_INT);
        $requeteisokdate->bindParam(':jour', $jour, PDO::PARAM_STR);

        $requeteisokdate->execute();
    
        $resultatok = $requeteisokdate->fetch(PDO::FETCH_ASSOC);

            var_dump($resultatok);

        if (!empty($resultatok)){
            
            return true;
        }
    }

    public function calendar(){

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

                                    
                                    $isokevent= $this->isdateok($heured, $jour);

                                    if ($isokevent == true){

                                        $requeteevent = $this->db->prepare("SELECT login, titre, reservations.id FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE (:heured BETWEEN DATE_FORMAT(debut, \"%T\") AND DATE_FORMAT(debut, \"%W\")=:jour AND WEEK(debut) = WEEK(CURDATE())");
                                        $requeteevent->bindParam(':heured', $heured, PDO::PARAM_INT);
                                        
                                        $requeteevent->bindParam(':jour', $jour, PDO::PARAM_STR);

                                        $requeteevent->execute();

                                        
                                        
                                
                                        $requeteisokdate = $requeteevent->fetchAll(PDO::FETCH_ASSOC);
                                                            
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
    }
}

?>