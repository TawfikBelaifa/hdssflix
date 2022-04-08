$(document).ready(function(){

    // SignUp
    $("#btnSignup").on("click", function(){
        $.post(
            './Backend/Action/connexionAction.php',
   			$('.dataInscription').serializeArray(),
            function(data,statut){
                if(statut){
                    $('.dataInscription').val("")
                }
            }
        )
    })

    //Login
    $("#btnLogin").on("click", function(){
        $.post(
            './Backend/Action/loginAction.php',
            $('.dataLogin').serializeArray(),
            function(reponse){
                var dataFront = $('.dataLogin').serializeArray();
                reponse = JSON.parse(reponse)
                if(dataFront[0].value == reponse.mail){
                    if(dataFront[1].value == reponse.mdp){
                        sessionStorage.setItem('name', reponse.fullname);
                        sessionStorage.setItem('statu', reponse.statu);
                        window.location.replace("./Membre.php");
                    }
                }else{
                    console.log("Identifiant/MDP Incorrect")
                }
            }
        )
    })

    // Add new serie
    $("#btnAddSerie").on("click", function(e){
        e.preventDefault()
        $.ajax({
            url: './Backend/Action/serieAction.php',
            type: 'POST',
            data: new FormData($(".allDataSerie")[0]), 
            cache: false,
            contentType: false,
            processData: false,
            function(reponse){
                $(".dataSerie").val("")
                if(reponse == "1"){
                    $(".msgAddserie").hide()
                    $(".msgAddserie .sucess").show()
                    $(".msgAddserie .sucess").html("Serie Ajoutée avec succés")
                }
            }
        });
    })
    
    // Add new saison
    $("#btnAddSaison").on("click", function(){
        $.post(
            './Backend/Action/addSaison.php',
            $('.dataSaison').serializeArray(),
            function(reponse){
                $(".msgAdd").show() 
                reponse = JSON.parse(reponse)
                if(reponse == "1"){   
                    $(".msgAddsaison .echec").hide()
                    $(".msgAddsaison .sucess").show()
                    $(".msgAddsaison .sucess").html("Saison Ajoutée avec succés");
                }else{
                    $(".msgAddsaison .sucess").hide()
                    $(".msgAddsaison .echec").show()
                    $(".msgAddsaison .echec").html("Cette saison existe déjà");
                }
                
            }
        )
    })

    // Add new episode
    $("#btnAddEpisode").on("click", function(e){
        console.log()
        e.preventDefault()
        console.log($(".dataEpisode").serializeArray())
        $.ajax({
            url: './Backend/Action/addEpisode.php',
            type: 'POST',
            data: new FormData($(".allDataEpisode")[0]), 
            cache: false,
            contentType: false,
            processData: false,
            function(reponse){
                $(".dataSerie").val("")
                if(reponse == "1"){
                    $(".msgAddserie").hide()
                    $(".msgAddserie .sucess").show()
                    $(".msgAddserie .sucess").html("Serie Ajoutée avec succés")
                }
            }
        });
    })

    // ADD NEW FILM
    $("#btnAddFilm").on("click", function(e){
        console.log($($(".allDataFilm")[0]).serializeArray())
        e.preventDefault()
        $.ajax({
            url: './Backend/Action/addFilm.php',
            type: 'POST',
            data: new FormData($(".allDataFilm")[0]), 
            cache: false,
            contentType: false,
            processData: false,
            function(reponse){
                $(".dataSerie").val("")
                if(reponse == "1"){
                    $(".msgAddserie").hide()
                    $(".msgAddserie .sucess").show()
                    $(".msgAddserie .sucess").html("Serie Ajoutée avec succés")
                }
            }
        });
    })
})
