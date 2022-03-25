<?php

    include "../API.php";

    if(!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['nom']) ){
        signUp($_POST['password'],$_POST['email'],$_POST['nom']);
    }
	
?>