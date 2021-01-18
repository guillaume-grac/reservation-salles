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
        
                echo '<section class="alert alert-danger text-center" role="alert"> Cet utilisateur est <b>déjà existant</b> !</section>';
        
            }
            else{

                if($password === $confirm_password){

                    $statement = $this->db -> prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
                
                    $statement -> execute([
                    "login"=>$login,
                    "password"=>$crypted
                    ]);
            
                    header('location: connexion.php');
                    exit();
                    
                }
                else{

                    echo'<section class="alert alert-danger text-center" role="alert"><b>Oups !</b> Mot de passe incorect !</section>';
                }
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
    }


    public function update(){

        if(isset($_SESSION['id'])){
            if(isset($_POST['update'])){

                    $Nlogin= htmlspecialchars(trim($_POST['Nlogin']));
                    $Npassword= htmlspecialchars(trim($_POST['Npassword']));
                    $NCpassword= htmlspecialchars(trim($_POST['NCpassword']));
                   
                if($Npassword === $NCpassword){

                    $crypted = password_hash($Npassword, PASSWORD_BCRYPT);

                    $verifLog = $this->find($Nlogin);

                    if($verifLog){
                        
                        echo '<section class="alert alert-danger text-center" role="alert"> Cet utilisateur est déjà existant !<br><a href="profil.php" class="alert-link">Veuillez réessayer ici.</a></section>';
        
                        die();
                    }
                    else{
                        $update = $this->db -> prepare("UPDATE utilisateurs SET login = :Nlogin, password = :Npassword WHERE id =:id");
                        $update->execute([
                        "Nlogin"=>$Nlogin,
                        "Npassword"=>$crypted,
                        "id"=>$_SESSION['id']
                        ]);
                    
                        echo "Compte modifié <br>";
                    }
                }
                else{

                    echo '<section class="alert alert-danger text-center" role="alert"> Les <b>mots de passe</b> ne sont pas identiques.</section>';
                }
            }
        }
    }
}

?>