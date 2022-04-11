<?php

    class Seance extends Connexion{
        
        public function __construct(){
            parent::__construct();
        }

        // GETTERS

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        // INSERTION

        public function addSeance($film,$date,$heure,$format,$salle){
            $os = new Seance();
            if($connexion = ($os->getBDD())){
                $film=$connexion->quote($film);
                $format=$connexion->quote($format);
                $salle=$connexion->quote($salle);
                $requete="INSERT INTO seance (id,film,date,heure,format,salle) VALUES ('', $film, '$date','$heure',$format,$salle)";
                $insertion=$connexion->exec($requete);
            }
        }

        //  SELECTION

        public function getSeanceByKey(){

        }

        public function getAllSeance(){

        }

        // UPDATE

        public function update(){

        }

    }    

?>