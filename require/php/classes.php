<?php

require_once('Modele.php');

class userpdo extends Modele{

    private $id = '';
    public $login = '';
    public $password = '';

    public function register($login, $password){
        
        $statement = $this->db -> prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
            
        $statement -> execute([

        "login"=>$login,
        "password"=>$password,
        ]);
    }

    public function find($login){

        $statement = $this->db -> prepare("SELECT login FROM utilisateurs WHERE login =:login");

        $statement -> execute([

            "login"=>$login
        ]);

        $result = $statement->fetch();

        return $result;
    }

    public function connect ($login, $password){

        session_start();

        if(isset($login, $password)){

            $verifPass = $this->db -> prepare("SELECT password FROM utilisateurs WHERE login = :login ");
            $verifPass->execute([
                "login"=>$login
            ]);

            $count=$verifPass->rowCount();

            $query = $this ->db -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
            $query->execute([
                "login"=>$login
            ]);
 
            if($count){

                
                $user = $query->fetch(PDO::FETCH_ASSOC);
                $result = $verifPass->fetch(PDO::FETCH_ASSOC);
 
                if(password_verify($password, $result['password'])){ 
                    
                    $this->id = $user['id'];
                    $this->login = $user['login'];
                    $this->password = $user['password'];

                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;
                    
                    echo " Bravo connexion réussie <br>";
                }
                else{
                    echo " Mauvais MDP <br>";
                }
                return $user;
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


    public function update($login, $password){

        $previousLogin = $this->login;
        
        $login = htmlspecialchars(trim($login));
        $password = password_hash($password, PASSWORD_BCRYPT);
        
        $update = $db -> prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE login ='$previousLogin'");
        $update->execute([
            "login"=>$login,
            "password"=>$password,
        ]);
       
        echo "Compte modifié <br>";
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