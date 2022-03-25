<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getSerieName();
    echo json_encode($API);
?>
