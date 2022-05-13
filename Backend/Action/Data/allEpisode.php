<?php
    include "../../API.php";

    $pos = new Episode();
    $API = $pos->getAllEpisode();
    echo json_encode($API);
?>
