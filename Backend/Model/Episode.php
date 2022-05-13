<?php
    class Episode extends Saison{
        
        public function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function addEpisode($title, $serie, $saison, $format, $version, $video_name, $video_tmpname, $resume){
            $os = new Episode();
            if($connexion = ($os->getBDD())){
                $os->uploadImgEpisode($saison,$serie,$video_tmpname, $video_name);
                $serie = $os->getSerieId($serie);
                $title=$connexion->quote($title);
                $saison=$connexion->quote($saison);
                $format=$connexion->quote($format);
                $version=$connexion->quote($version);
                $resume=$connexion->quote($resume);
                $requete="INSERT INTO episode (id_episode,titre,id_serie,id_saison,format,videoname,resume,version) VALUES ('',$title,$serie,$saison,$format,'$video_name',$resume,$version)";
                $insertion=$connexion->exec($requete);
                return $insertion;
            }
        }

        public function uploadImgEpisode($saison,$serie,$video_tmpname, $video_name){
            $repository = "../../movieSerie/".$serie."/".$saison;
            $chemindef=$repository."/".$video_name;
            $tmp_name = $video_tmpname;
            move_uploaded_file($tmp_name, $chemindef);
        }
        

        public function getIdEpisode($episodeName){
            
        }

        public function getAllEpisode(){
            $os = new Episode();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM episode ORDER BY id_serie DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }
    }
?>

