<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet/less" type="text/css" href="./CSS/styles.css" /> 
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
</head>
<body>
    <div id="app_prise">
        <div class="header">
            <div class="left">
                <div v-if="statu == 1" class="statu">Admin</div>
                <div class="logoApp"><img src="./img/hdssflix_logo_4.png" alt="" srcset=""></div>
                
            </div>
            <nav class="right">
                <ul>
                    <router-link to="/Messenger" ><li><img id="messengerImg" src="./img/facebook-messenger.png" alt="" srcset=""></li></router-link>
                    <router-link to="/" ><li><img src="./img/search.png" alt=""></li></router-link>
                    <li ><img src="./img/redmenu.png" alt="" class="menuAffiche"></li>
                </ul>
            </nav>
        </div>
        <div class="slid-menu">
            <ul>
                <li class="btn-menu"><div class="__btn-menu"><img src="./img/redmenu.png" alt="" class="menuHide"></div></li>
                <router-link to="/" ><li>Accueil</li></router-link>
                <router-link to="/Profil" ><li>Profil</li></router-link>
                <router-link to="/Notification" ><li>Notification</li></router-link>
                <router-link to="/Parameter" ><li>Paramettre</li></router-link>
                <router-link to="/Preference" ><li>Préférence</li></router-link>
                <router-link to="/Reservation" ><li>Reservation</li></router-link>
            </ul>
        </div>
        <div id="containVue">
            <router-view></router-view>
        </div>
    </div>




    <?php
        include "./Composant/parameter.html";
        //include "./Composant/netflix-animation.html";
        include "./Composant/home.html";
        include "./Composant/oneFilm.html";
        include "./Composant/oneSerie.html";
        include "./Composant/preference.html";
        include "./Composant/reservation.html";
        include "./Composant/messenger.html";
    ?>


    <!-- Importation Vuejs ... -->
	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
	<script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/vue-cookies@1.5.12/vue-cookies.js"></script>


    <!-- Importation de jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Importation Front-App javascript -->
    <script src="./FrontApp/app.js"></script>
    <script src="./FrontApp/controllerCall.js"></script>

    <script src="./Vuejs2/Vue.js"></script>
</html>