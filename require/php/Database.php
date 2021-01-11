<?php 

class Database{

    private static $instance = NULL;

    public static function getPdo(){

        if(self::$instance === NULL){

            try{
                self::$instance = new PDO('mysql:host=localhost; dbname=reservationsalles', 'root', '');
            }
            catch (PDOException $e){
    
                print 'Erreur :' . $e -> getMessage();
    
                die();
            }
        }
        return self::$instance;
    }
}
