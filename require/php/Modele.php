<?php

require_once('Database.php');

abstract class Modele{

    protected $db;

    public function __construct(){

        $this->db = Database::getPdo();
    }
}