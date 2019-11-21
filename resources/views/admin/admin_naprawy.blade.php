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
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dodaj_kategorie">Dodaj kategorię</button>
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

<div class="modal modal-danger fade" id="dodaj_kategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
        </div>
        <form action="{{route('admin.dodaj_kategorie')}}" method="post">
            
                @csrf
            <div class="modal-body">
              <div class="form-group">
                  <label for="title">Nazwa kategorii</label>
                  <input type="text" class="form-control" name="name" id="name">
              </div>
  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Anuluj</button>
              <button type="submit" class="btn btn-success">Dodaj</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    

@endsection