<?php

    class Connexion {
        public function __construct(){}
        
        public function getBDD(){
            $connexion = new PDO("mysql:host=localhost;dbname=hdssflix",'root','');
            return $connexion;
        }
    }
?>