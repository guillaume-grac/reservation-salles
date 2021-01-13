<?php 

require_once('Modele.php');

class Event extends Modele{

    public function reservation(){

        if(isset($_POST['reservation'])){

            $titre = htmlspecialchars(trim($_POST['titre']));
            $description = htmlspecialchars(trim($_POST['description']));
            $Ddate = $_POST['date1'];
            $Fdate = $_POST['date2'];
            $Dtime = $_POST['heure1'];
            $Ftime = $_POST['heure2'];
            $id_user = $_SESSION['id'];

            $d = new DateTime($Ddate);
            $d2 = new DateTime($Fdate);

            $t = new DateTime($Dtime);
            $t2 = new DateTime($Ftime);

            $diff = $t -> diff($t2);
            $diffStr = $diff -> format('%H:%i:%s');

            if($d -> format('w') == 6 || $d -> format('w') == 0 && $d2 -> format('w') == 6 || $d2 -> format('w') == 0){
                
                echo '<section class="alert alert-danger text-center" role="alert"><b>Attention !</b> Les réservations se font <b>uniquement du lundi au vendredi</b>.</section>';
               
            }
            elseif ($diffStr != '01:0:0')
            {
                echo "Vous ne pouvez réservez que pour 1 heure.";
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
}


?>