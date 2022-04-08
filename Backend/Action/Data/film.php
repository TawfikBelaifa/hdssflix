<?php
    include "../../API.php";

    $pos = new Film();
    $API = $pos->getAPI();
    echo json_encode($API);
?>
