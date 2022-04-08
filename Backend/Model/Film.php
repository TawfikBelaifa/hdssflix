<?php
    class Film extends Connexion{

        function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        // INSERTION

        public function addFilm($titre,$acteur,$resume,$genre,$realisateur,$anne, $imgname, $imgtmp_name, $videoname,$videotmp_name){
            $os = new Serie();
            $op = new Film();
            
            if($connexion = ($os->getBDD())){
                $titre=$connexion->quote($titre);
                $acteur=$connexion->quote($acteur);
                $resume=$connexion->quote($resume);
                $genre=$connexion->quote($genre);
                $realisateur=$connexion->quote($realisateur);
                $anne=$connexion->quote($anne);
                
                $requete="INSERT INTO film (id,	titre,	genre,	acteur,	realisateur,	annee,	resume,	image,	video,	masqued) VALUES ('','$titre','$genre','$acteur','$resume','$realisateur','$anne','$imgname','$videoname',0)";
                $insertion=$connexion->exec($requete);
                $a = $op->MkdirSerie($titre);
                //$dossier= "../../movieFilm/".$titre;
                $op->uploadImg($imgname,$titre,$imgtmp_name);
                $op->uploadImg($videoname,$titre,$videotmp_name);
                //$idLastEntry = $os->addRepository();
                //$idLastEntry = $os->uploadImg($imgname,$idLastEntry, $imgtmp_name);
                return $insertion;
            }
        }

        // GETTERS  
        
        public function getAPI(){
            $os = new Film();
            if($connexion = ($os->getBDD())){
                $requete = "SELECT * FROM film WHERE masqued=0";
                $result=$connexion->query($requete);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
            
        }


        // IMAGE MANAGEMENT

        public function addRepository(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT id,titre FROM film ORDER BY id DESC limit 1";
				$result=$connexion->query($recherche);
				$tab=$result->fetch();
                $os->MkdirSerie($tab['titre']);
                return $tab['id'];
            }
        }

        public function uploadImg($nameImg,$dossier,$imgtmp_name){
            $repository = "../../movieFilm/".$dossier;
            $chemindef=$repository."/".$nameImg;
            $tmp_name = $imgtmp_name;
            move_uploaded_file($tmp_name, $chemindef);
        }

        public function MkdirSerie($film){
            if($film != ""){
                $repository = "../../movieFilm/".$film;
                mkdir($repository, 0777, true);
            }
        }

    }
?>