<?php
    include "../API.php";
    if( !empty($_POST['titleEpisode']) && !empty($_POST['serie']) && !empty($_POST['saison']) && !empty($_POST['format']) && !empty($_POST['version']) && !empty($_FILES["videoSerie"]['name']) && !empty($_FILES["videoSerie"]['tmp_name']) && !empty($_POST['resumeEpisode']) ){
        $os = new Episode();
        $os->addEpisode($_POST['titleEpisode'], $_POST['serie'], $_POST['saison'], $_POST['format'], $_POST['version'], $_FILES["videoSerie"]['name'], $_FILES["videoSerie"]['tmp_name'], $_POST['resumeEpisode']);
    }
?>