<?php
    include "../../../API.php";

    $pos = new Serie();
    $API = $pos->getGenre();
    echo json_encode($API);
?>
