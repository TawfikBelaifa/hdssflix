<?php
    include "../API.php";

    // Déclaration des variables 
    $acteur = "";
    
   if(!empty($_POST['titleSerie']) && !empty($_POST['acterSerie1']) && !empty($_POST['resumeSerie']) && !empty($_POST['genre']) && !empty($_POST['realisateurSerie']) && !empty($_POST['anneeSerie'])){
        for($i=1; $i<=count($_POST); $i++)
        {
            if(isset($_POST['acterSerie'.$i])){
                $acteur = $acteur."".$_POST['acterSerie'.$i]."_";
            }
            else{
                break;
            }
        }

        $pos = new Film();
        $API = $pos->addSerie($_POST['titleSerie'], $acteur, $_POST['resumeSerie'], $_POST['genre'], $_POST['realisateurSerie'], $_POST['anneeSerie'], $_FILES["imgSeries"]['name'], $_FILES["imgSeries"]['tmp_name']);
        
    }

?>