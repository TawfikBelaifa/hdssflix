<?php
    include "../../../API.php";

    $pos = new Serie();
    $API = $pos->getAnne();
    echo json_encode($API);
?>
