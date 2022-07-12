<?php
    include "../API.php";
    $os = new Messenger();
    $response = $os->sendMessage($_GET['expediteur'], $_GET['destinateur'], $_GET['messageSender']);
?>  