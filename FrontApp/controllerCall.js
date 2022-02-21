$(document).ready(function(){
    $("#btnSignup").on("click", function(){
        $.post(
            './Backend/Controller/connexionController.php',
   			$('.dataInscription').serializeArray()
        )
    })
})
