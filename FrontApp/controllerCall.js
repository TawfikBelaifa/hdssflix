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
                    $(".msgAdd").show()
                    $(".msgAdd .sucess").show()
                    $(".msgAdd .sucess").html("Serie Ajouter avec succés")
                    
                }
            }
        });
    })
    
    // Add new saison
    $("#btnAddSaison").on("click", function(){
        console.log("click")
        console.log($('.dataSaison').serializeArray(),)
        $.post(
            './Backend/Action/addSaison.php',
            $('.dataSaison').serializeArray(),
            function(reponse){
                $(".msgAdd").show()
                $(".msgAdd .sucess").show()
                $(".msgAdd .sucess").html("Saison Ajoutée avec succés")
            }
        )
    })


})
