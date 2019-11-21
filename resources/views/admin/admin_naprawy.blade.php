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
          <hr class="bg-info">
          <div class="row">        
                  <div class="col-lg-12">
                    <div class="float-right">
                      <button type="button" class="btn btn-success">Dodaj kategorię</button>
                    </div>
                      <table class="table table-bordered table-striped">
                              <thead>
                                  <tr class="text-center bg-info text-light">
                                      <th>Lp.</th>
                                      <th>Nazwa kategorii</th>
                                      <th>Edytuj</th>
                                      <th>Usuń</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i=1; ?>
                                    @foreach($categories as $category)
          
                                      <tr class="text-center">
                                          <td> {{$i++}}</td>
                                          <td>{{ $category->name }}</td>
                                          <td><button><i class="fas fa-edit"></i></button></td>
                                          <td><button><i class="far fa-trash-alt"></i></button></td>
                                  
                                      </tr>
          
                                    @endforeach
                              </tbody>
          
                      </table>
          
                  </div>
              </div>
        </div>
      </div>
    
</div>


    

@endsection