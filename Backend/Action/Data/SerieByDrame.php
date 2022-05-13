<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getSerieDrame();
    echo json_encode($API);
?>
