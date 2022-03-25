<?php

class Login extends Connexion{

	function __construct(){
		parent::__construct();
	}

	public function getBDD(){
		$connexion = parent::getBDD();
		return $connexion;
	}

	public function seConnecter($email,$mdp){
		$os = new Login();
		if ($email&&$mdp) {
			if ($co = ($os->getBDD())) {
				$mdp=$co->quote($mdp);
				$email=$co->quote($email);		
				$recherche="SELECT * FROM user WHERE mail=$email AND mdp =$mdp";
				$result=$co->query($recherche);
				$tab=$result->fetch(PDO::FETCH_OBJ);
			}
		}
		return $tab;
	}
}

	

?>