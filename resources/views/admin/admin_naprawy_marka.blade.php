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
            <div class="float-left">
                <a class="text-reset" href="{{route('admin.admin_naprawy')}}">Kategorie </a>>
                <a class="text-reset" href="{{route('admin.admin_naprawy_marka',$category->slug)}}">{{$category->name}}</a>
                
            </div><br>
          <hr class="bg-info">
          <div class="row">        
                  <div class="col-lg-12">
                    <div class="float-right">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-categoryid={{$category->id}} data-target="#dodaj_marke">Dodaj marke</button>
                    </div>
                      <table class="table table-bordered table-striped">
                              <thead>
                                  <tr class="text-center bg-info text-light">
                                      <th>Lp.</th>
                                      <th>Marka</th>
                                      <th>Opis</th>
                                      <th>Edytuj</th>
                                      <th>Usuń</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i=1; ?>
                                    @foreach($brands as $brand)
                                      <tr class="text-center">
                                          <td> {{$i++}}</td>
                                          <td><a href="{{route('admin.admin_naprawy_model', $brand->slugi)}}">{{ $brand->name }}</a></td>
                                          <td><p>{{ $brand->description }}</p></td>
                                            <td><button type="button" class="btn btn-info" data-name="{{$brand->name}}" data-description="{{$brand->description}}"  data-brandid={{$brand->id}} data-toggle="modal" data-target="#edytuj_marke"><i class="fas fa-edit"></i></button></td>
                                          <td><button type="button" class="btn btn-danger" data-brandid={{$brand->id}} data-toggle="modal" data-target="#delete_brand"><i class="far fa-trash-alt"></i></button></td>
                                      </tr>
          
                                    @endforeach
                              </tbody>
          
                      </table>
                      <div class="col-12 d-flex justify-content-center">
                            {{$brands->links()}}
                          </div>
                  </div>
              </div>
        </div>
      </div>  
</div>

<div class="modal modal-danger fade" id="dodaj_marke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             
            </div>
            <form action="{{route('admin.dodaj_marke')}}" method="post">
                
                    @csrf
                <div class="modal-body">
                  <div class="form-group">
                      <label for="title">Nazwa marki</label>
                      <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                        <label for="title">Opis</label>
                        <textarea class="form-control rounded-0" name="description" id="description" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="id" id="category_id" value="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Anuluj</button>
                  <button type="submit" class="btn btn-success">Dodaj</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    
      <div class="modal modal-danger fade" id="delete_brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
              </div>
              <form action="{{route('admin.delete_brand')}}" method="post">
                  
                      @csrf
                  <div class="modal-body">
                        <p class="text-center">
                            Napewno chcesz usunąć tą markę?
                        </p>
                        <input type="hidden" name="id" id="brand_id" value="">
        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Nie, anuluj</button>
                    <button type="submit" class="btn btn-warning">Tak, Usuń</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    
    
        <!-- Modal Edytuj marke-->
    <div class="modal fade" id="edytuj_marke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edytuj markę</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.edytuj_marke')}}" method="post">
                @csrf
              <div class="modal-body">
                  <input type="hidden" name="id" id="brand_id" value="">
                  <div class="form-group">
                        <label for="title">Nazwa marki</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                          <label for="title">Opis</label>
                          <textarea class="form-control rounded-0" name="description" id="description" rows="3"></textarea>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection