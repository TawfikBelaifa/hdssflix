<?php

    class Reservation extends Saison{
        
        public function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        function reserver(){
            $os = new Reservation();
            if($connexion = ($os->getBDD())){
                $film=$connexion->quote($film);
                $format=$connexion->quote($format);
                $salle=$connexion->quote($salle);
                $requete="INSERT INTO seance (id,film,date,heure,format,salle) VALUES ('', $film, '$date','$heure',$format,$salle)";
                $insertion=$connexion->exec($requete);
            }
        }
    }
?>