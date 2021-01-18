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

    public function calendar(){

        $query = $this ->db -> prepare("SELECT * FROM reservations");
        $query->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC));

    }
}


?>