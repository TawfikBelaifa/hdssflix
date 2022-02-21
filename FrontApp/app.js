$(document).ready(function(){

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

    //UI/UX Interaction
    $(".switchBtn").on("click",SwitchUILogin)
})