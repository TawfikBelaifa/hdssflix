<?php

use LDAP\Result;

    class Serie extends Connexion{

        function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        // INSERTION

        public function addSerie($titre,$acteur,$resume,$genre,$realisateur,$anne, $imgname, $imgtmp_name){
            $os = new Serie();
            
            if($connexion = ($os->getBDD())){
                $titre=$connexion->quote($titre);
                $acteur=$connexion->quote($acteur);
                $resume=$connexion->quote($resume);
                $genre=$connexion->quote($genre);
                $realisateur=$connexion->quote($realisateur);
                $anne=$connexion->quote($anne);
                $requete="INSERT INTO serie (id,titre,acteur,resume,genre,realisateur,anne,img,masqued) VALUES ('',$titre,$acteur,$resume,$genre,$realisateur,$anne,'$imgname',0)";
                $insertion=$connexion->exec($requete);
                $idLastEntry = $os->addRepository();
                $idLastEntry = $os->uploadImg($imgname,$idLastEntry, $imgtmp_name);
                return $insertion;
            }
        }


        // GETTERS
        
        public function getRecommandedSerie($idUser){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $result = $os->getRecommandationUsers($idUser);
                $genr = $result['genre'];
                $an = $result['annee'];
                $realisateur = $result['realisateur'];
                $recherche="SELECT * FROM serie WHERE genre='$genr' OR realisateur='$realisateur' OR anne='$an'";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getRecommandationUsers($idUser){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM preference WHERE id_user='$idUser'";
				$result=$connexion->query($recherche);
				$tab=$result->fetch();
                return $tab;
            }
        }

        public function getAnne(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT DISTINCT anne FROM serie ORDER BY anne DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getRealisateur(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT DISTINCT realisateur FROM serie ORDER BY id DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getGenre(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT DISTINCT genre FROM serie ORDER BY id DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getSerieId($name){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT id FROM serie WHERE titre='$name'";
                $result=$connexion->query($recherche);
                $tab=$result->fetch();
                return $tab['id'];
            }
        }

        public function getApiSerie(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM serie WHERE masqued=0 ORDER BY id DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getSerieAction(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM serie WHERE masqued=0 AND genre='Action' ORDER BY id DESC LIMIT 9";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }
        
        public function getSerieDrame(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM serie WHERE masqued=0 AND genre='Drame' ORDER BY id DESC LIMIT 9";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getSerieSF(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM serie WHERE masqued=0 AND genre='scienceFiction' ORDER BY id DESC LIMIT 9";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        public function getSerieOthers(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM serie WHERE masqued=0 AND genre!='scienceFiction' AND genre!='Drame' AND genre!='Action' ORDER BY id DESC LIMIT 9";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        // OTHERS 

        public function masqueSerie($idSerie){
            if($idSerie != null){
                $os = new Serie();
                if($connexion = ($os->getBDD())){
                    $requete="UPDATE serie SET masqued=1 WHERE id=$idSerie";
                    $updated=$connexion->exec($requete);
                }
            }
        }

        public function acterFormat($acteur){
            
        }

        // IMAGE MANAGEMENT

        public function addRepository(){
            $os = new Serie();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT id,titre FROM serie ORDER BY id DESC limit 1";
				$result=$connexion->query($recherche);
				$tab=$result->fetch();
                $os->MkdirSerie($tab['titre']);
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

        public function MkdirSerie($SerieName){
            if($SerieName != ""){
                $repository = "../../movieSerie/".$SerieName;
                mkdir($repository, 0777, true);
            }
        }

    }
?>