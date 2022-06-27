<?php

    class Reservation extends Saison{
        
        public function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function addReservation($film,$date,$heure,$iduser){
            $os = new Seance();
            if($connexion = ($os->getBDD())){
                $film=$connexion->quote($film);
                $requete="INSERT INTO reservation (id,id_user,date,heure,film) VALUES ('',$iduser, '$date','$heure',$film)";
                $insertion=$connexion->exec($requete);
            }
        }
    }
?>