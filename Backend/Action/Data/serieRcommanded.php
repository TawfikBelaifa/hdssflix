<?php
    include "../../API.php";

    $pos = new Serie();
    $data = json_decode(file_get_contents("php://input"), true);
    $task = $data['userid'];
    $API = $pos->getRecommandedSerie($task);
    echo json_encode($API);
?>
