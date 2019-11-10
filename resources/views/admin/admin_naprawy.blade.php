@extends('master')

@section('content')
<div class="container">
<div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.admin')}}"><h5 class="text-info">Użytkownicy</h5></a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.admin_naprawy')}}"><h5 class="text-info">Naprawy</h5></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
              
        </div>
      </div>
    
</div>


    

@endsection