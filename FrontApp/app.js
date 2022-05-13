$(document).ready(function(){
    let i = 2
    // Varibles
    let state = false
    const flip = document.querySelector('.inner__form'),
    fliphold = document.querySelector('.inner__aside');

    //Function
    function SwitchUILogin(){
            if(!state){
                flip.classList.add("active");
                fliphold.classList.add("active")
                state = true;
            }else{
                flip.classList.remove("active");
                fliphold.classList.remove("active")
                state = false;
            }
    }

    $(".addSerie_contain").hide()
    $(".box_parameter_center").hide();
    $(".box_parameter_center ul").hide();
    $("#addSerie_contain").hide()
    $(".msgAdd").hide()
    $(".msgAdd .sucess").hide()
    $(".msgAdd .echec").hide()
    $(".hideSerie_PrincipalContain").hide()
    $(".addSeance_contain").hide()
    $(".slid-menu").hide()
    $(".responseBack .sucess, .responseBack .echec").hide()

    //UI/UX Interaction
    $(".switchBtn").on("click",SwitchUILogin);
    
    $("#_addSerie").on("click", function(){
        $(".newAdd").css("display", "none")
        $(".addSerie_contain").css("display", "flex");
    });

    $("#_addSaison").on("click", function(){
        $(".newAdd").css("display", "none")
        $(".addSaison_contain").css("display", "flex");
    })

    $("#_addEpisode").on("click", function(){
        $(".newAdd").css("display", "none")
        $(".addEpisode_contain").css("display", "flex");
    })

    $("#_hideSerie").on("click",function(){
        $(".newAdd").css("display", "none")
        $(".hideSerie_PrincipalContain").show()
    })

    $("#_addFilm").on("click",function(){
        $(".newAdd").css("display", "none")
        $(".addFilm_contain").show()
    })

    $("#_addSeance").on('click', function(){
        $(".newAdd").css("display", "none")
        $(".addSeance_contain").show()
    })

    $("#parameter").on("click", function(){
        $(".show").hide()
        $(".liClicked").removeClass("liClicked")
        $(".box_parameter_center").show();
        $("#parameter_fonction").show();
        $("#parameter_fonction").addClass("show");
        $("#parameter").addClass("liClicked")
    })

    $("#serie").on("click", function(){
        $(".show").hide()
        $(".liClicked").removeClass("liClicked")
        $(".box_parameter_center").show();
        $("#serie_fonction").show();
        $("#serie_fonction").addClass("show");
        $("#serie").addClass("liClicked")
    })

    $("#film").on("click", function(){
        $(".show").hide()
        $(".liClicked").removeClass("liClicked")
        $(".box_parameter_center").show();
        $("#movie_fonction").show();
        $("#movie_fonction").addClass("show");
        $("#film").addClass("liClicked")
    })

    $("#reservation").on("click", function(){
        $(".show").hide()
        $(".liClicked").removeClass("liClicked")
        $(".box_parameter_center").show();
        $("#reservation_fonction").show();
        $("#reservation_fonction").addClass("show");
        $("#reservation").addClass("liClicked")
    })


    $('#btnAddActer').on('click', function(){
        console.log("click")
		$('.lcas').append('<input type="texte" name="acterSerie'+i+'" placeholder="Acteur '+i+'" class="acteur dataSerie">')
		i += 1
	})

    
    $('.acterFilm').on('click', function(){
        console.log("click")
		$('.acterContainFilm').append('<input type="texte" name="acterSerie'+i+'" placeholder="Acteur '+i+'" class="acteur dataSerie">')
		i += 1
	})

    var time = setTimeout(function(){
        $(".container").hide()
    }, 4000)

    $(".menuAffiche").on("click", function(){
        $(".slid-menu").show()
    })

    $(".menuHide").on("click", function(){
        $(".slid-menu").hide()
    })

    $(".slid-menu ul li").on("click", function(){
        $(".slid-menu").hide()
    })

})