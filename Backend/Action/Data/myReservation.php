<?php
        include "../../API.php";
        $os = new Reservation();

        $data = json_decode(file_get_contents("php://input"), true);
        $API = $os->getReservationById($data['userid']);
        echo json_encode($API);

?>