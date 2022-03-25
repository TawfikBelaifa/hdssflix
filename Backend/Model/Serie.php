<?php
    class Serie extends Connexion{

        function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function addSerie($titre,$acteur,$resume,$genre,$realisateur,$anne, $imgname, $imgtmp_name){
            $os = new Serie();
            
            if($connexion = ($os->getBDD())){
                $titre=$connexion->quote($titre);
                $acteur=$connexion->quote($acteur);
                $resume=$connexion->quote($resume);
                $genre=$connexion->quote($genre);
                $realisateur=$connexion->quote($realisateur);
                $anne=$connexion->quote($anne);
                $requete="INSERT INTO serie (id,titre,acteur,resume,genre,realisateur,anne,img) VALUES ('',$titre,$acteur,$resume,$genre,$realisateur,$anne,'$imgname')";
                $insertion=$connexion->exec($requete);
                $idLastEntry = $os->addRepository();
                $idLastEntry = $os->uploadImg($imgname,$idLastEntry, $imgtmp_name);
                return $insertion;
            }
        }

        public function addRepository(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT id FROM serie ORDER BY id DESC limit 1";
				$result=$connexion->query($recherche);
				$tab=$result->fetch();
                return $tab['id'];
            }
        }

        public function uploadImg($nameImg,$dossier,$imgtmp_name){
            $repository = "../../imgSerie/".$dossier;
            mkdir($repository, 0777, true);
            $chemindef=$repository."/".$nameImg;
            $tmp_name = $imgtmp_name;
            move_uploaded_file($tmp_name, $chemindef);
        }

        public function getID(){

        }

        public function acterFormat($acteur){
            
        }

    }
?>