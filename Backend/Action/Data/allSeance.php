<?php
    include "../../API.php";

    $pos = new Seance();
    $data = json_decode(file_get_contents("php://input"), true);
    $API = $pos->getSeanceApi($data['nameFilm']);
    echo json_encode($API);
?>
