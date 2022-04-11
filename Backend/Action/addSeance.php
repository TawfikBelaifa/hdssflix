<?php
    include "../API.php";

    if(!empty($_POST['filmChoice']) && !empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['format']) && !empty($_POST['salle'])){
        $os = new Seance();
        $os->addSeance($_POST['filmChoice'],$_POST['date'],$_POST['heure'],$_POST['format'],$_POST['salle']);
        echo "1";
    }
?>