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
        var donnee = $(".dataSerie")
        console.log(donnee)
        console.log($(donnee).serializeArray())
         /* $.post(
            './Backend/Action/serieAction.php',
            $(".dataSerie").serializeArray(),
            function(reponse){
                if(reponse == "1"){
                    $(".msgSerieAdd").show()
                    $(".msgSerieAdd .sucess").show()
                    $(".msgSerieAdd .sucess").html("Serie Ajouter avec succés")
                    $(".dataSerie").val("")
                }
            }
        ) */

       /* $.ajax({
            url:"./Backend/Action/serieAction.php",
            type: "POST",
            dataType: "JSON",
            data: new FormData(donnee),
            processData: false,
            contentType: false,
            success: function (data, status)
            {
                console.log(data)
            },
            error: function (xhr, desc, err, data)
            {
                console.log(data)
    
            }
        }); */

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
                    $(".msgSerieAdd").show()
                    $(".msgSerieAdd .sucess").show()
                    $(".msgSerieAdd .sucess").html("Serie Ajouter avec succés")
                    
                }
            }
        });
    })
    

})
