<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getApiSerie();
    echo json_encode($API);
?>
