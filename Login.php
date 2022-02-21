<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HdssFlix</title>
    <link rel="stylesheet" href="./CSS/Login.css">
</head>
<body>

<div class="loginContent">
        <div class="form__area">
        <div class="inner__form">
            <div class="login__form">
                <img src="./img/hd.png" alt="" class="logoAppLogSign">
                <h2 class="form__heading">Login</h2>
                <div class="input__group">
                    <label for="">Name</label>
                    <div id="cntPswImg">
                        <img src="./img/user.png" alt="">
                        <input type="text" placeholder="Enter full Name">
                    </div>
                </div>
                <div class="input__group">
                    <label for="">Password</label>
                    <div id="cntPswImg">
                        <img src="./img/padlock.png" alt="">
                        <input type="password" placeholder="Enter password">
                    </div>
                </div>
                <button class="btn">Login</button>
                <a href="" class="forget__link">Forget password?</a>
                <div class="social__links">
                    <p>Or login with</p>
                    <img src="./img/google.png" alt="">
                    <img src="./img/instagram.png" alt="">
                    <img src="./img/facebook.png" alt="">
                    <img src="./img/twitter.png" alt="">
                </div>
            </div>
            <div class="signup__form">
                <img src="./img/hd.png" alt="" class="logoAppLogSign">
                <h2 class="form__heading">Signup</h2>
                <div class="input__group">
                    <label for="">Name</label>
                    <div id="cntPswImg">
                        <img src="./img/user.png" alt="">
                        <input type="text" placeholder="Enter full Name" name="nom" class="dataInscription">
                    </div>
                </div>
                <div class="input__group">
                    <label for="">Password</label>
                    <div id="cntPswImg">
                        <img src="./img/padlock.png" alt="">
                        <input type="password" placeholder="Enter password" name="password" class="dataInscription">
                    </div>
                </div>
                <div class="input__group">
                    <label for="">Confirm Password</label>
                    <div id="cntPswImg">
                        <img src="./img/padlock.png" alt="">
                        <input type="password" placeholder="Confirm password" name="comfimpsw" class="dataInscription">
                    </div>
                </div>
                <div class="input__group">
                    <label for="">Email</label>
                    <div id="cntPswImg">
                        <img src="./img/gmail.png" alt="">
                        <input type="email" placeholder="Enter your email" name="email" class="dataInscription">
                    </div>
                </div>
                <button class="btn" id="btnSignup">Signup</button>
                <div class="social__links">
                    <p>Or signup with</p>
                    <img src="./img/google.png" alt="">
                    <img src="./img/instagram.png" alt="">
                    <img src="./img/facebook.png" alt="">
                    <img src="./img/twitter.png" alt="">
                </div>
            </div>
        </div>
        <div class="aside">
            <div class="inner__aside">
                <span class="signup__section " > <div class="questionSignUp">Don't have account?</div>  <div class="reverseSignUp switchBtn">Signup</div></span>
                <span class="login__section " > <div class="questionLogin">Have an account?</div>  <div  class="reverseLogin switchBtn">Login</div></span>
            </div>
        </div>
    </div>
    </div>
    
	<!-- Importation de jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Importation Front-App javascript -->
    <script src="./FrontApp/app.js"></script>
    <script src="./FrontApp/controllerCall.js"></script>
</body>
</html>