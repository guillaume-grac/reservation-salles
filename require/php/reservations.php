<?php 

require_once('Modele.php');

class Event extends Modele{

    public function reservation(){

        if(isset($_POST['reservation'])){

            $d = new DateTime('w'); 

            if($d->format('w') === 0 || $d->format('w') === 6){
                
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