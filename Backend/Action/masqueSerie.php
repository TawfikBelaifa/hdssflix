<?php
    include "../API.php";
    if(!empty($_GET['idSerie'])){
        $pos = new Serie();
        $API = $pos->masqueSerie($_GET['idSerie']);
        echo "1";
    }
?>