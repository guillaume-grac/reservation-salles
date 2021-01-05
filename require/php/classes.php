<?php

require_once('Modele.php');

class userpdo extends Modele{


    public function register(){

        if(isset($_POST['register'])){

            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));
            $confirm_password = htmlspecialchars(trim($_POST['confirm-password']));
            $crypted = password_hash($password, PASSWORD_BCRYPT);
        
            $verifLog = $this->find($login);
        
            if($verifLog){
        
                echo "Utilisateur existant, veuillez réessayer : <a href ='inscription.php'> ici </a>";
        
                die();
            }
        
            if($password === $confirm_password){

                $statement = $this->db -> prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
            
                $statement -> execute([
                "login"=>$login,
                "password"=>$crypted
                ]);
        
                echo '<section class="alert alert-success text-center" role="alert"><b>Félicitations !</b> Votre compte a bien été créer.</section>';
            }

            else{
                echo'<section class="alert alert-danger text-center" role="alert"><b>Oups !</b> Mot de passe incorect !</section>';
            }
        }
    }

    public function find($login){

        $statement = $this->db -> prepare("SELECT login FROM utilisateurs WHERE login =:login");

        $statement -> execute([

            "login"=>$login
        ]);

        $result = $statement->fetch();

        return $result;
    }

    public function connect (){

        if(isset($_POST['connexion'])){

            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));

            $verifPass = $this->db -> prepare("SELECT password FROM utilisateurs WHERE login = :login ");
            $verifPass->execute([
                "login"=>$login
            ]);

            $count=$verifPass->fetch();

            if($count){

                $check=$count['password'];

                if(password_verify($password, $check)){ 

                    $query = $this ->db -> prepare("SELECT * FROM utilisateurs WHERE login = :login AND password = :password");
                    $query->execute([
                    "login"=>$login,
                    "password"=>$check
                    ]);

                    $allInfos = $query->fetch(PDO::FETCH_ASSOC);

                    if($query->rowCount()){
                        
                        $_SESSION['id'] = $allInfos['id'];
                        $_SESSION['login'] = $allInfos['login'];
                        $_SESSION['password'] = $allInfos['password'];

                    }

                    header('location: ../index.php');
                    exit();
                }

                else{
                    echo '<section class="alert alert-danger text-center" role="alert"><b>Oups !</b> Mot de passe incorect !</section>';
                }
            }
        }
    }

    public function disconnect(){

        if (isset($_POST['logout'])){

            session_destroy();
            header('location: pages/connexion.php');
            exit();
        }

        echo "Vous êtes déconnecté <br>";
    }


    public function update(){

        /*$previousLogin = $this->login;
        
        $login = htmlspecialchars(trim($login));
        $password = password_hash($password, PASSWORD_BCRYPT);
        
        $update = $db -> prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE login ='$previousLogin'");
        $update->execute([
            "login"=>$login,
            "password"=>$password,
        ]);
       
        echo "Compte modifié <br>"; */
    }

    public function isConnected(){

        $login = $this->login;

        if($login){
           
            echo " Vous êtes Connecté ";
            
           return true;

        }
    }
}

?>