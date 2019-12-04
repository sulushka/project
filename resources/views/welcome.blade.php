<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TI-Space</title>
        <link rel="stylesheet" href="assets/css/landpg.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
        </style>
    </head>

    <body>
        <!-----NavigationBar----> 
            <section id="nav-bar">
                @if (Route::has('login'))
                    <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#"><img src="assets/img/logo.png"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                  <a class="nav-link" href="#">Главная страница</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#about">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#services">Наши услуги</a>
                                  </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#footer">Адресс и контакты</a>
                                </li>
                                <li class="nav-item">
                                    @auth
                                            <a class="nav-link" href="{{ url('/home') }}">В систему</a>
                                        @else
                                            <a class="nav-link" href="{{ route('login') }}">Вход</a>

                                            {{-- @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Register</a>
                                            @endif --}}
                                        @endauth
                                </li>
                              </ul>
                            </div>
                            @endif
                          </nav>
            </section>

            <!-----Slider----->
            <div id="bannerslide" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="assets/img/ban1.jpg" class="d-block w-100" alt="banner">
                      
                    </div>
                </div>
              </div>
            
            
            <section id="about">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h2>О нас</h2>
                    <div class="about-content">
                      Мы предлагаем вам услуги подготовки к ЕНТ, НИШ, РФМШ, НУФИПЕТ, КТЛ. Наша цель дать качественные знания и развить в ученике логическое мышление. Мы работаем на протежении 4-х лет и смогли помочь более 100 студентам достичь их целей. TI Space обеспечит вам всестороннее развитие!
                    </div>
                   
                  </div>
                  <div class="col-md-6 skills-bar">
                    <p>Улучшение успеваемости</p>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%">100%</div>
                    </div>
                    <p>Поступление в предпочитаемые школы</p>
                    <div class="progress">
                     <div class="progress-bar" style="width: 90%">90%</div>
                    </div>
                    <p>Поступление на NUFYP</p>
                    <div class="progress">
                     <div class="progress-bar" style="width: 82%">82%</div>
                    </div>
                    <p>>110 на ЕНТ</p>
                    <div class="progress">
                     <div class="progress-bar" style="width: 92%">92%</div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-----Services---->
            <section id="services" >
              <div class="container">
                <h1>Наши услуги</h1>
                <div class="row services">
                  <div class="col-md-3" text-center>
                    <div class="icon">
                        <i class="fa fa-calculator"></i>
                    </div>
                    <h3>Математика</h3>
                  </div>
                  <div class="col-md-3" text-center>
                      <div class="icon">
                          <i class="fa fa-magnet"></i>
                      </div>
                      <h3>Физика</h3>
                    </div>
                    <div class="col-md-3" text-center>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <h3>Химия</h3>
                      </div>
                      <div class="col-md-3" text-center>
                          <div class="icon">
                              <i class="fa fa-book"></i>
                          </div>
                          <h3>Граммотность чтения</h3>
                        </div>                        
                </div>
              </div>
            </section>  

            <!-- Footer -->
            <footer id="footer" class="page-footer font-small unique-color-dark">
            
              <!-- Footer Links -->
              <div class="container text-center text-md-left mt-5">
            
                <!-- Grid row -->
                <div class="row mt-3">
            
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            
                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">TI Space</h6>
                    <p>Свяжитесь с нами и мы поможем вам достичь ваших целей! Доверьтесь нам!</p>
            
                  </div>
                  <!-- Grid column -->

            
                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            
                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Контакты</h6>
                    <p>
                      <i class="fa fa-home mr-3"></i>Таугуль, Алматы</p>
                    <p>
                      <i class="fa fa-envelope mr-3"></i>info@example.com</p>
                    <p>
                      <i class="fa fa-phone mr-3"></i>+7(707)1234567</p>
                    <p>
                      <i class="fa fa-print mr-3"></i>+7(707)1234567</p>
            
                  </div>
                  <!-- Grid column -->
            
                </div>
                <!-- Grid row -->
            
              </div>
              <!-- Footer Links -->
            
            </footer>
            <!-- Footer -->

    </body>
</html>
