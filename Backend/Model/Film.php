<?php
    class Serie extends Connexion{

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
            
            if($connexion = ($os->getBDD())){
                $requete="INSERT INTO film (id,	titre,	genre,	acteur,	realisateur,	annee,	resume,	image,	video,	masqued) VALUES ('','$titre','$genre','$acteur','$resume','$realisateur','$anne','$imgname','$videoname',0)";
                $insertion=$connexion->exec($requete);
                $idLastEntry = $os->addRepository();
                $idLastEntry = $os->uploadImg($imgname,$idLastEntry, $imgtmp_name);
                return $insertion;
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
            $repository = "../../imgFilm/".$dossier;
            mkdir($repository, 0777, true);
            $chemindef=$repository."/".$nameImg;
            $tmp_name = $imgtmp_name;
            move_uploaded_file($tmp_name, $chemindef);
        }

        public function MkdirSerie($SerieName){
            if($SerieName != ""){
                $repository = "../../movieFilm/".$SerieName;
                mkdir($repository, 0777, true);
            }
        }

    }
?>