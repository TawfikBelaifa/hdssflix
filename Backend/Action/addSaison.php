<?php
    include "../API.php";

    if(!empty($_POST['serieChoose']) && !empty($_POST['saison'])){
        $os = new Saison();
        $response = $os->addSaison($_POST['serieChoose'], $_POST['saison']);
        if($response == 1){
            echo "1";
        }else{
            echo "0";
        }
    }
?>  