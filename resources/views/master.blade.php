<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Laravel</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        


        <script src="https://kit.fontawesome.com/4286317d70.js" crossorigin="anonymous"></script>  
    </head>
    <body>
    
      <nav class="navbar navbar-expand-md navbar-light" style="">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar7"> <a class="navbar-brand text-primary d-none d-md-block" href="{{url('/')}}">
          <i class="fas fa-screwdriver"></i>
          <b>DOMOWY SERWIS</b>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a class="nav-link" href="{{url('/naprawy')}}">Naprawy</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">O nas</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Kontakt</a> </li>
          @if(Auth::check())
          @if(Auth::user()->hasRole('Admin'))
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.admin')}}">Panel admina</a> </li>
            @endif
            @if(Auth::user()->hasRole('Serwisant'))
            <li class="nav-item"> <a class="nav-link" href="{{route('serwisant.serwisant')}}">Panel serwisanta</a> </li>
            @endif
            @endif
        </ul>
        <ul class="navbar-nav">
        
             @if (Auth::check())
             <li class="nav-item"><a class="nav-link">{{Auth::user()->name}}</a></li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/wiadomosci')}}">
                  <i class="fas fa-envelope"></i></a></li>
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
  
    
      @yield('content')
    
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
      

      <script type="text/javascript" src="{{mix('js/app.js')}}"></script>

      <script>
  
          $('#delete').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var user_id = button.data('userid') 
              var modal = $(this)
              modal.find('.modal-body #user_id').val(user_id);
        })

        $('#bantak').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var user_id = button.data('userid') 
              var modal = $(this)
              modal.find('.modal-body #user_id').val(user_id);
        })

        $('#bannie').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var user_id = button.data('userid') 
              var modal = $(this)
              modal.find('.modal-body #user_id').val(user_id);
        })

        $('#delete_category').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var category_id = button.data('categoryid') 
              var modal = $(this)
              modal.find('.modal-body #category_id').val(category_id);
        })

        $('#edytuj_kategorie').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var name = button.data('name') 
              var category_id = button.data('categoryid') 
              var modal = $(this)
              modal.find('.modal-body #name').val(name);
              modal.find('.modal-body #category_id').val(category_id);
              
          })
          
          $('#dodaj_marke').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var category_id = button.data('categoryid') 
              var modal = $(this)
              modal.find('.modal-body #category_id').val(category_id);
        })

        $('#edytuj_marke').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var name = button.data('name') 
              var description = button.data('description') 
              var brand_id = button.data('brandid') 
              var modal = $(this)
              modal.find('.modal-body #name').val(name);
              modal.find('.modal-body #description').val(description);
              modal.find('.modal-body #brand_id').val(brand_id);
              
          })

          $('#delete_brand').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var brand_id = button.data('brandid') 
              var modal = $(this)
              modal.find('.modal-body #brand_id').val(brand_id);
        })


        $('#dodaj_model').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var brand_id = button.data('brandid') 
              var modal = $(this)
              modal.find('.modal-body #brand_id').val(brand_id);
        })

        $('#edytuj_model').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var name = button.data('name') 
              var description = button.data('description') 
              var device_id = button.data('deviceid') 
              var modal = $(this)
              modal.find('.modal-body #name').val(name);
              modal.find('.modal-body #description').val(description);
              modal.find('.modal-body #device_id').val(device_id);
              
          })

          $('#delete_device').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var device_id = button.data('deviceid') 
              var modal = $(this)
              modal.find('.modal-body #device_id').val(device_id);
        })

        </script>
        

    </body>
</html>
