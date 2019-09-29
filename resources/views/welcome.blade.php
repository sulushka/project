<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TI-Space</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

        
           

        html {
        scroll-behavior: smooth;
        font-family: 'Nunito', sans-serif;
        }

        body {
            margin:0px;
            padding:0px;
        }

        .bgimage{
            background-image: linear-gradient(rgba(32, 32, 32, 0.6),rgba(34, 34, 34, 0.6)),url('{{ asset('assets/img/4.jpg') }}');
        background-size: 100% 125%;
        width: 100%;
        height: 100vh;
        }

        .menu{
        width:100%;
        height: 100px;
        background-color: rgba(36, 35, 35, 0.8);
        }

        .leftmenu{
        width: 20%;
        line-height: 80px;
        float: left;
        }

        .leftmenu h2{
        padding-left: 50px;
        font-weight: bold;
        color: white;
        font-size: 22px;
        font-family: 'Noto Sans KR', sans-serif;
        }

        .rightmenu{
        width: 75%;
        height: 100px;
        float: right;

        }


        .rightmenu ul {
        margin-left: 30%;

        }

        .rightmenu ul a{
        font-family: 'Nunito', sans-serif;
        display: inline-block;
        list-style: none;
        font-size: 15px;
        color: white;
        margin-left: 10%;
        font-weight: bold;
        line-height: 80px;
        text-decoration: none;
        text-decoration: none;
        }

        .rightmenu ul a:hover{
        color: rgb(219, 63, 15);
        }

        .banext{
        width: 100%;
        margin-top: 185px;
        text-transform: uppercase;
        text-align: center;
        color: white;
        }

        .banext h4{
        font-size: 14px;
        font-family: 'Play', sans-serif;

        }

        .banext h1{
        font-size: 60px;
        font-family: 'Oswald', sans-serif;  
        font-weight: 700px;
        margin: 14px 0px;
        }

        .banext h3{
            font-size: 12px;
            font-family: 'Play', sans-serif;
        }

        * {box-sizing: border-box}
        body {font-family: Verdana, sans-serif; margin:0}
        .mySlides {display: none}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
        max-width: 800px;
        position: relative;
        margin: auto;
        margin-top: 17%;
        }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
        color: #020202;
        font-size: 20px;
        font-family: monospace;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        cursor: pointer;
        height: 10px;
        width: 10px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
        }
        </style>
    </head>
    <body>
        <div class="bgimage">
            @if (Route::has('login'))
            <div class="menu">
                    <div class="leftmenu">
                            <h2> TI-Space </h2>
                    </div>
                    
                    <div class="rightmenu">
                        <ul>
                                <a>О нас</a>
                                <a href="#team">Наша команда</a>
                                <a>Онлайн-заявки</a>

                                @auth
                                    <a href="{{ url('/home') }}">На главную</a>
                                @else
                                    <a href="{{ route('login') }}">Вход</a>

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif --}}
                                @endauth

                        </ul>
                        
                    </div>
                @endif
            
            </div>
           
                     <div class="banext">
                        <h4>Проводники в мире знаний</h4>
                        <h1>Только с TI-Space</h1>
                        <h3>Только вперед</h3>
                    </div>
                  
                  
                  
                  
                  
                    <div id="team" class="slideshow-container">
                  
                        <div class="mySlides fade">
                          <div class="numbertext">1 / 3</div>
                          <img src="assets/img/a.jpg" style="width:100%">
                          <div class="text">Physics teacher</div>
                        </div>
                        
                        <div class="mySlides fade">
                          <div class="numbertext">2 / 3</div>
                          <img src="assets/img/b.jpg" style="width:100%">
                          <div class="text">Mathematics teacher</div>
                        </div>
                        
                        <div class="mySlides fade">
                          <div class="numbertext">3 / 3</div>
                          <img src="assets/img/c.jpg" style="width:100%">
                          <div class="text">English teacher</div>
                        </div>
                        
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        
                    </div>
                        
                        <br>
                        <div style="text-align:center">
                          <span class="dot" onclick="currentSlide(1)"></span> 
                          <span class="dot" onclick="currentSlide(2)"></span> 
                          <span class="dot" onclick="currentSlide(3)"></span> 
                        </div>
                  
                        <script>
                            var slideIndex = 1;
                            showSlides(slideIndex);
                            
                            function plusSlides(n) {
                              showSlides(slideIndex += n);
                            }
                            
                            function currentSlide(n) {
                              showSlides(slideIndex = n);
                            }
                            
                            function showSlides(n) {
                              var i;
                              var slides = document.getElementsByClassName("mySlides");
                              var dots = document.getElementsByClassName("dot");
                              if (n > slides.length) {slideIndex = 1}    
                              if (n < 1) {slideIndex = slides.length}
                              for (i = 0; i < slides.length; i++) {
                                  slides[i].style.display = "none";  
                              }
                              for (i = 0; i < dots.length; i++) {
                                  dots[i].className = dots[i].className.replace(" active", "");
                              }
                              slides[slideIndex-1].style.display = "block";  
                              dots[slideIndex-1].className += " active";
                            }
                            
                        </script>
                  

        </div>
    </body>
</html>
