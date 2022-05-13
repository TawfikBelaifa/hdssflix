<?php
    class Saison extends Serie{

        public function __construct(){
            parent::__construct();
        }


        public function addSaison($serie, $libelle){
            $os = new Saison();
            
            if($connexion = ($os->getBDD())){
                
                $isDoublons = $os->getDoublons($serie, $libelle);
                if( $isDoublons == 0){
                    $os->MkdirSaison($serie, $libelle);
                    $idSerie = $os->getSerieId($serie);
                    $libelle=$connexion->quote($libelle);
                    $requete="INSERT INTO saison (id_serie,libelle) VALUES ('$idSerie',$libelle)";
                    $insertion=$connexion->exec($requete);
                    return 1;
                }else{
                    return 0;
                }
            }  
        }

        // GETTERS 

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }
        
        public function getDoublons($serie,$saison){
            $os = new Saison();
            
            if($connexion = ($os->getBDD())){
                $idSerie = parent::getSerieId($serie);
                $recherche="SELECT * FROM saison WHERE libelle='$saison' AND id_serie=$idSerie";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll();
                if(count($tab)>=1){
                    return 1;
                }else{
                    return 0;
                }
            }
        }

        public function getApiSaison(){
            $os = new Saison();
            if($connexion = ($os->getBDD())){
                $recherche="SELECT * FROM saison ORDER BY id_serie DESC";
				$result=$connexion->query($recherche);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

        // REPOSITORY MANAGEMENT
        public function MkdirSaison($serie, $saison){
            if($serie != "" && $saison != ""){
                $repository = "../../movieSerie/".$serie."/".$saison;
                mkdir($repository, 0777, true);
            }
        }
    }
?>