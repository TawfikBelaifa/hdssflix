<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getSerieOthers();
    echo json_encode($API);
?>
