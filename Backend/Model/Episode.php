<?php
    class Episode extends Saison{
        
        public function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function addEpisode($title, $serie, $saison, $format, $version, $video, $resume){
            $os = new Episode();
            
            if($connexion = ($os->getBDD())){
                $title=$connexion->quote($title);
                $serie = $os->getSerieId($serie);;
                $saison=$connexion->quote($saison);
                $format=$connexion->quote($format);
                $version=$connexion->quote($version);
                $version=$connexion->quote($version);
                $video=$connexion->quote($video);
                $requete="INSERT INTO episode (id,titre,id_serie,id_saison,format,videoname,resume) VALUES ('',$title,$acteur,$resume,$genre,$realisateur,$anne,'$imgname')";
                $insertion=$connexion->exec($requete);
                $idLastEntry = $os->addRepository();
                $idLastEntry = $os->uploadImg($imgname,$idLastEntry, $imgtmp_name);
                return $insertion;
            }
        }
    }
?>

