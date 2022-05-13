<?php
    include "../../API.php";

    $pos = new Saison();
    $API = $pos->getApiSaison();
    echo json_encode($API);
?>
