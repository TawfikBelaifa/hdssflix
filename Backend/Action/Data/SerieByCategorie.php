<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getSerieAction();
    echo json_encode($API);
?>
