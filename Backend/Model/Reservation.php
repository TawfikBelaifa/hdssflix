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

        public function getReservationById($id){
            $os = new Seance();
            if($connexion = ($os->getBDD())){
                $requete = "SELECT * FROM reservation r, film f, seance s WHERE r.film=f.titre AND r.film=s.film AND r.date=s.date AND r.heure=s.heure AND id_user=$id";
                $result=$connexion->query($requete);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }
    }
?>