<?php
    include "../../API.php";

    $pos = new Messenger();
    $data = json_decode(file_get_contents("php://input"), true);
    $API = $pos->getMessageByDestinataire($data["exp"],$data["dest"]);
    echo json_encode($API);
?>
