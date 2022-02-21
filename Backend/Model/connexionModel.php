<?php
    function ConnexionBDD(){
        $serveur='localhost';
        $db='hdssflix';
        $utilisateur='root';
        $mot_passe='';
        $connexion = new PDO("mysql:host=$serveur;dbname=$db",$utilisateur,$mot_passe);
        if($connexion) {
            return $connexion;
        }
    }
?>