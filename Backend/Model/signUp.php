<?php
    function signUp($mdp,$email,$fullname){
        if($connexion = ConnexionBDD()){
            $mdp=$connexion->quote($mdp);
            $email=$connexion->quote($email);
            $fullname=$connexion->quote($fullname);
			$requete="INSERT INTO user (ID ,mail, mdp, statu, fullname) VALUES ('',$email,$mdp,0,$fullname)";
			$insertion=$connexion->exec($requete);
        }
    }
?>