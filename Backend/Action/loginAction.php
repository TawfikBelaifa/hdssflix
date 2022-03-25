<?php
    include "../API.php";
    
    if(!empty($_POST['password']) && !empty($_POST['email'])){
        $pos = new Login();
        $API = $pos->seConnecter($_POST['email'],$_POST['password']);
        $API = json_encode($API);
        echo $API;
    }
?>