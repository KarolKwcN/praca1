<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        


        <script src="https://kit.fontawesome.com/4286317d70.js" crossorigin="anonymous"></script>  
    </head>
    <body>
      <div id="app">
      <nav class="navbar navbar-expand-md navbar-light" style="">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar7"> <a class="navbar-brand text-primary d-none d-md-block" href="{{url('/')}}">
          <i class="fas fa-screwdriver"></i>
          <b>DOMOWY SERWIS</b>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a class="nav-link" href="#">Naprawy</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">O nas</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Kontakt</a> </li>
          @if(Auth::check())
          @if(Auth::user()->hasRole('Admin'))
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.admin')}}">Panel admina</a> </li>
            @endif
            @endif
        </ul>
        <ul class="navbar-nav">
        
             
      
                 @if (Auth::user())
             <li class="nav-item"><a class="nav-link">{{Auth::user()->name}}</a></li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout')}}">
                <i class="fas fa-user"></i></a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/logout')}}">
                <i class="fas fa-sign-out-alt"></i>
                </a> </li>
            @else
                <li class="nav-item"> <a class="nav-link" href="{{route('login')}}">Zaloguj
                <i class="fas fa-sign-in-alt"></i>
                 </a> </li>
                 <li class="nav-item"> <a class="nav-link" href="{{route('register')}}">Zarejestrój
                <i class="fas fa-key"></i>
                 </a> </li>
            @endif
            

        </ul>
      </div>
    </div>
  </nav>
  
  <div class="py-5 text-center text-md-right" style="background-image: url(https://static.pingendo.com/cover-bubble-dark.svg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-3">Wyszukaj naprawę</h3>
          <p class="mb-3 lead">Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.</p>
          <form class="form-inline d-flex justify-content-end">
            <div class="input-group"> <input type="email" class="form-control" placeholder="Wymiana ekranu iphone" id="formcover1">
              <div class="input-group-append"> <button class="btn btn-primary" type="button">Szukaj</button> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-lg-10">
          <h1>Naprawiaj z nami</h1>
          <p class="mb-3 mx-auto w-75 lead">Kategorie najczęstrzych napraw. Wybierz co Cię interesuje i napraw to.</p> 
          <div class="row">
            <div class="col-md-3 mt-4 px-4 col-6"> <a href="/"><img src="/images/ikony/screen128.png"></a>
              <h5> <b>Ekran</b></h5>
              <p class="mb-3">I should be incapable of drawing a single stroke.</p>
            </div>
            <div class="col-md-3 mt-4 px-4 col-6"> <a href="/"><img src="/images/ikony/bateria128.png"></a>
              <h5> <b>Bateria</b></h5>
              <p class="mb-3">A wonderful serenity has taken possession.</p>
            </div>
            <div class="col-md-3 mt-4 px-4 col-6"> <a href="/"><img src="/images/ikony/mniejsze128.png"></a>
              <h5> <b>Mniejsze części</b> </h5>
              <p class="mb-3">Like these sweet mornings of spring.</p>
            </div>
            <div class="col-md-3 mt-4 px-4 col-6"> <a href="/"><img src="/images/ikony/program128.png"></a>
              <h5> <b>Systemowe</b> </h5>
              <p class="mb-3">I enjoy with my whole heart.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-8 order-2 order-lg-1"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-2.svg"> </div>
        <div class="col-lg-2 col-4 d-flex flex-column justify-content-between order-3 order-lg-2"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"> <img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-4.svg"> </div>
        <div class="px-md-5 p-3 d-flex flex-column justify-content-center col-lg-6 order-1 order-lg-3">
         
          <h1>Najnowsza naprawa</h1>
          <p class="lead">I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5" style="background-image: url(https://static.pingendo.com/cover-bubble-dark.svg); background-position: right bottom;  background-size: cover; background-repeat: repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="ml-auto p-3 col-md-2 bg-white"> <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-1.svg"> </div>
        <div class="p-3 col-md-7 mr-auto bg-white text-dark">
          <div class="blockquote mb-0">
            <p>"A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine."</p>
            <div class="blockquote-footer"> <b>J. W. Goethe</b>, CEO at Werther Inc.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
    
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center d-md-flex align-items-center"> 
          <ul class="nav mx-md-auto d-flex justify-content-center">
            <li class="nav-item"> <a class="nav-link active" href="#">Strona główna</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Naprawy</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">O nas</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Kontakt</a> </li>
          </ul>
          <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2"> 
              <a href="#">
                <i class="fab fa-instagram fa-lg mx-2"></i>
              </a> <a href="#">
                <i class="fab fa-facebook fa-lg mx-2"></i>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mt-2 mb-0">Karol Kwiecień</p>
        </div>
      </div>
    </div>
  </div>
      </div>

      <script type="text/javascript" src="{{mix('js/app.js')}}"></script>
    </body>
</html>
