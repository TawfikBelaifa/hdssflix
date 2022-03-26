<?php
    include "../API.php";

    if(!empty($_POST['serieChoose']) && !empty($_POST['saison'])){
        $os = new Serie();
        $API = $os->addSaison($_POST['serieChoose'], $_POST['saison']);
    
    }

?>