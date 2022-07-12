<?php
    include "../../API.php";

    $pos = new Messenger();
    $API = $pos->getAllUser();
    echo json_encode($API);
?>
