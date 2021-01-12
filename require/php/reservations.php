<?php 

require_once('Modele.php');

class Event extends Modele{

    public function reservation(){

        if(isset($_POST['reservation'])){

            date_default_timezone_set('UTC');

            $date = new DateTime('2000-01-01');

            if (($heure < "8") && ($heure > "19")){
                
                echo "Les réservations ne sont pas disponibles";
               
            }
            else{

                $titre = htmlspecialchars(trim($_POST['titre']));
                $description = htmlspecialchars(trim($_POST['description']));
                $Ddate = $_POST['date1'];
                $Fdate = $_POST['date2'];
                $id_user = $_SESSION['id'];
                
                $statement = $this->db->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
                    
                $statement->execute([
                "titre"=>$titre,
                "description"=>$description,
                "debut"=>$Ddate,
                "fin"=>$Fdate,
                "id_utilisateur"=>$id_user
                ]);
                
                header('location: reservation-form.php');
                exit();  
            }
        }
    }
}


?>