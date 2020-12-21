<?php

class userpdo{

    private $id = '';
    public $login = '';
    public $password = '';
   

    public function register($login, $password){

        try{
            $db = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
        }
        catch (PDOException $e){

            print 'Erreur :' . $e -> getMessage();

            die();
        }

        //Il manque la vérification de login.
              
            $confirm_password=$_POST['confirm-password'];

            if($password === $confirm_password){

            $statement = $db -> prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
            
            $statement -> execute([

                "login"=>$login,
                "password"=>$password,
            ]);
            
            echo "Vous êtes enregistré !";
            }
    }

    public function connect ($login, $password){
    
        try{
            $db = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
        }
        catch (PDOException $e){

            print 'Erreur :' . $e -> getMessage();

            die();
        }

        if(isset($login, $password)){

            $verifPass = $db -> prepare("SELECT password FROM utilisateurs WHERE login = :login ");
            $verifPass->execute([
                "login"=>$login
            ]);

            $count=$verifPass->rowCount();

            $query = $db -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
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
        
        $this->id = null;
        $this->login = null;
        $this->password = null;

        echo "Vous êtes déconnecté <br>";
    }

    public function delete(){

        try{
            $db = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
        }
        catch (PDOException $e){

            print 'Erreur :' . $e -> getMessage();

            die();
        }

        $login = $this->login;

        $req = $db -> prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $req->execute([
            "login"=>$login
        ]);

        if($req = true){

        $delete = $db -> prepare("DELETE FROM utilisateurs WHERE login = :login");
        $delete->execute([
            "login"=>$login
        ]);

        echo "Bye Bye <br>";

        }
    }

    public function update($login, $password){

        try{
            $db = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
        }
        catch (PDOException $e){

            print 'Erreur :' . $e -> getMessage();

            die();
        }

        $previousLogin = $this-> login;
        
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

    public function getAllInfos(){

        $login = $this->login;
        $password = $this->password;

        return[$login,$password];

    }

    public function getLogin(){
        return ($this->login);
    }


    public function refresh()
    {
        try{
            $db = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
        }
        catch (PDOException $e){

            print 'Erreur :' . $e -> getMessage();

            die();
        }

        $id = $this -> id;

        $req = $db -> prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $req->execute([
            "id"=>$id
        ]);

        if ($req)
        {
            $result = $req->fetch(PDO::FETCH_ASSOC);

            $this ->login = $result['login'];
            $this ->password = $result['password'];

            return $result;
        }
    }
}

?>