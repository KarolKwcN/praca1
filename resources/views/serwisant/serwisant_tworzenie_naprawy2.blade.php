@extends('master')

@section('content')
<div class="container">
    <legend>Tworzenie naprawy dla {{$deviceName}} (Etap 2/3)</legend>
    <hr>
    
    <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="px-lg-5 d-flex flex-column justify-content-center col-lg-6">
              <h1>{{$repair->name}}</h1>
            <p class="mb-3 lead">{{$repair->description}}</p>
            </div>
            <div class="col-lg-6"> <img class="img-fluid d-block" src="/images/{{$deviceName}}/{{$repair->name}}/{{$imageName}}"> </div>
          </div>
        </div>
      </div>



    
        
       
            <h1>
                Dodawanie kroków
            </h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dodaj_krok">Dodaj krok</button>
            <hr>

    </div>

    <div class="modal modal-danger fade" id="dodaj_krok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             
            </div>
            <form action="{{route('admin.dodaj_kategorie')}}" method="post">
                
                    @csrf
                <div class="modal-body">
                  <div class="form-group">
                      <label for="title">Nazwa kroku</label>
                      <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div id="steps">
                  <div class="row">
                    <div class="col-xs-2">
                        <button style="margin-left:10px;" type="button" v-on:click="addNewApartment" class="btn btn-block btn-success">
                            Dodaj zdjecia i opisy
                        </button>
                    </div>
                   
                </div>
                <hr>
                <div v-for="(apartment, index) in apartments">
                    <div class="row">
                      
                        <div class="form-group col-xs-5">
                            <label>Zdjecie</label>
                            <input v-model="apartment.image" type="file"
                                   name="apartments[][image]" class="input-file" >
                        </div>
                        <div class="form-group col-xs-5">
                       
                            <textarea v-model="apartment.description" type="textarea"
                                   name="apartments[][description]" class="form-control" placeholder="Opis" rows="3"></textarea>
                                   
                        </div>
                        <div class="col-xs-2">
                            <label>&nbsp;</label>
                            <button style="margin-left:50px;" type="button" v-on:click="removeApartment(index)" class="btn btn-block btn-danger">
                               Usuń
                            </button>
                        </div>
                       
                    </div>
                </div>
      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Anuluj</button>
                  <button type="submit" class="btn btn-success">Dodaj</button>
                </div>
           
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript" src="/js/steps.js"></script>

@endsection