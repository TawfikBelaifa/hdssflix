<?php
    include "../API.php";
        $os = new Preference();
        $response = $os->create($_GET['iduser'], $_GET['genre'], $_GET['realisateur'],$_GET['anne']);
?>  