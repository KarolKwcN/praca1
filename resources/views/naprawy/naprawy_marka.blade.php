@extends('master')

@section('content')

<div class="pt-2 pb-5">
    <div class="container">
      <div class="row pt-3">
        <div class="col-md-12">
          <h5 class="">{{$category->name}}</h5>
        </div>
      </div>
      <div class="row">
        @foreach($brands as $brand)
        <div class="col-lg-2 col-md-2 m-2" style="">

          

          <div class="row">
            <div class="col-3 col-md-12 p-2 border" style=""> <img class="d-block img-fluid" src="https://static.pingendo.com/img-placeholder-4.svg" style="">
              <div class="col-9 col-md-12">
                <p class="lead mb-1"> <b>{{$brand->name}}</b> </p>
              </div>
            </div>
          </div>

          
        </div>
        @endforeach
 
      </div>
    </div>
  </div>

@endsection