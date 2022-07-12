<?php
	if(basename(dirname($_SERVER['SCRIPT_NAME'])) == "Action" ){
        include "../Model/connexionModel.php";
        include "../Model/signUp.php";
        include "../Model/Login.php";
        include "../Model/Serie.php";
        include "../Model/Saison.php";
        include "../Model/Episode.php";
        include "../Model/Film.php";
        include "../Model/Seance.php";
        include "../Model/Preference.php";
        include "../Model/Reservation.php";
        include "../Model/Messenger.php";
    }

    if(basename(dirname($_SERVER['SCRIPT_NAME'])) == "Data" ){
        include "../../Model/connexionModel.php";
        include "../../Model/signUp.php";
        include "../../Model/Login.php";
        include "../../Model/Serie.php";
        include "../../Model/Saison.php";
        include "../../Model/Episode.php";
        include "../../Model/Film.php";
        include "../../Model/Seance.php";
        include "../../Model/Preference.php";
        include "../../Model/Reservation.php";
        include "../../Model/Messenger.php";
    }

    if(basename(dirname($_SERVER['SCRIPT_NAME'])) == "preference" ){
        include "../../../Model/connexionModel.php";
        include "../../../Model/signUp.php";
        include "../../../Model/Login.php";
        include "../../../Model/Serie.php";
        include "../../../Model/Saison.php";
        include "../../../Model/Episode.php";
        include "../../../Model/Film.php";
        include "../../../Model/Seance.php";
        include "../../../Model/Preference.php";
        include "../../../Model/Reservation.php";
        include "../../../Model/Messenger.php";
    }

    
?>