<?php
    function signUp($mdp,$email,$statu){
        if($connexion = ConnexionBDD()){
            $mdp=$connexion->quote($mdp);
            $email=$connexion->quote($email);
            $statu=$connexion->quote($statu);
			$requete= "INSERT INTO user (ID ,mail, mdp,statu) VALUES ('', $email,$mdp, 0)";
			$insertion = $connexion->exec($requete);

        } 
    }
?>