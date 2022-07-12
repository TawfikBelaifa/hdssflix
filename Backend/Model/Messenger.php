<?php
    class Messenger extends Connexion{

        function __construct(){
            parent::__construct();
        }
    
        public function getBDD(){
            $connexion = parent::getBDD();
            return $connexion;
        }

        public function sendMessage($expediteur, $destinateur, $messageenv){
            $os = new Messenger();
            if($connexion = ($os->getBDD())){
                $requete = "INSERT INTO messenger (id,expediteur,destinateur,message,lue) VALUES ('', $expediteur,$destinateur,'$messageenv',0)";
                $insertion = $connexion->exec($requete);
            }
        }

        public function getMessageByDestinataire($exp, $dest){
            $os = new Messenger();
            if($connexion = ($os->getBDD())){
                $requete = "SELECT * FROM messenger WHERE expediteur=$exp AND destinateur=$dest OR expediteur=$dest AND destinateur=$exp";
                $result=$connexion->query($requete);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }  
        }

        public function getAllUser(){
            $os = new Messenger();
            if($connexion = ($os->getBDD())){
                $requete = "SELECT * FROM user";
                $result=$connexion->query($requete);
				$tab=$result->fetchAll(PDO::FETCH_OBJ);
                return $tab;
            }
        }

    }
?>