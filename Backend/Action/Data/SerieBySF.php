<?php
    include "../../API.php";

    $pos = new Serie();
    $API = $pos->getSerieSF();
    echo json_encode($API);
?>
