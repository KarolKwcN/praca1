@extends('master')

@section('content')
<div class="container">
<form method="POST" action="{{ route('serwisant.serwisant_tworzenie_naprawy',$device->slugii)}}" class="form-horizontal" enctype="multipart/form-data">
  @csrf
    <fieldset>
    
    <!-- Form Name -->
    <legend>Tworzenie naprawy dla {{$device->name}} (Etap 1/3)</legend>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nazawa naprawy:</label>  
      <div class="col-md-6">
      <input id="textinput" name="name" type="text" placeholder="nazwa" class="form-control input-md">
        
      </div>
    </div>
    
    
    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textarea">Opis naprawy:</label>
      <div class="col-md-4">                     
        <textarea class="form-control" id="textarea" name="description"></textarea>
      </div>
    </div>


      <!-- File Button --> 
    <div class="form-group">
        <label class="col-md-4 control-label" for="filebutton">Wybierz zdjęcie:</label>
        <div class="col-md-4">
          <input id="filebutton" name="zdj" class="input-file" type="file">
        </div>
      </div>

        <!-- Button -->
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="col-md-4">
              
              <button type="submit" class="btn btn-primary">Dalej</button>
            </div>
          
    
    </fieldset>
    </form>
</div>

@endsection