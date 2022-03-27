<?php
    class Saison extends Serie{

        public function __construct(){
            parent::__construct();
        }

        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function addSaison($serie, $libelle){
            $os = new Saison();
            
            if($connexion = ($os->getBDD())){
                
                $isDoublons = $os->getDoublons($serie, $libelle);
                if( $isDoublons == 0){
                    $idSerie = $os->getSerieId($serie);
                    $serie=$connexion->quote($serie);
                    $libelle=$connexion->quote($libelle);
                    $requete="INSERT INTO saison (id_serie,libelle) VALUES ('$idSerie',$libelle)";
                    $insertion=$connexion->exec($requete);
                    return 1;
                }else{
                    return 0;
                }
            }  
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

        public function getSaisonId($serie, $saison){
            $os = new Saison();
            $idSerie = $os->getSerieId($serie);
            if($connexion = ($os->getBDD())){
                $recherche="SELECT id FROM saison WHERE libelle='$saison' AND id_serie=$idSerie ORDER BY id ASC limit 1";
				$result=$connexion->query($recherche);
				$tab=$result->fetch();
                echo $tab['id'];
                return $tab['id'];
                
            }
        }
    }
?>