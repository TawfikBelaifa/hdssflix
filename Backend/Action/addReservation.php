<?php
    include "../API.php";
    
        $os = new Reservation();

        for($i=0; $i<count($_GET); $i++){
            if(isset($_GET['date'.$i]) && isset($_GET['heure'.$i])){
                $os->addReservation($_GET['film'],$_GET['date'.$i],$_GET['heure'.$i],$_GET['iduser']);
                echo "1";
            }else{
                break;
            }
        }
                
?>