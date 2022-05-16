<?php
    include "../../API.php";

    $pos = new Serie();
    $data = json_decode(file_get_contents("php://input"), true);
    $API = $pos->getRecommandedSerie($data['userid']);
    echo json_encode($API);
?>
