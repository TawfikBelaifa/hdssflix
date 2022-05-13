<?php
    include "../../../API.php";

    $pos = new Serie();
    $API = $pos->getRealisateur();
    echo json_encode($API);
?>
