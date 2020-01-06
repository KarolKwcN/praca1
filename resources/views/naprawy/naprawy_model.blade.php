@extends('master')

@section('content')

<div class="py-4 text-center">
    <div class="container">

        <h1>{{$brand->name}}</h1>
      <div class="row">
        @foreach($devices as $device)
     <div class="h-25 col-lg-2">
          <div class="card">
            <div class="card-body p-1 m-1"> <img class="img-fluid d-block mb-0 mx-auto img-thumbnail" src="https://static.pingendo.com/img-placeholder-3.svg" width="150">
            <h1>{{$device->name}}</h1>
            </div>
          </div>
        </div>	
        @endforeach

      </div>
    </div>
  </div>

@endsection