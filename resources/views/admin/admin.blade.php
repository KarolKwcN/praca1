@extends('master')

@section('content')
<div class="container">
<div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.admin')}}"><h5 class="text-info">Użytkownicy</h5></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.admin_naprawy')}}"><h5 class="text-info">Naprawy</h5></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
        <div id="app">
          <chat></chat>
        </div>
        <div class="card-body">
                <hr class="bg-info">
                <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center bg-info text-light">
                                            <th>Lp.</th>
                                            <th>Imię</th>
                                            <th>E-Mail</th>
                                            <th>Ban</th>
                                            <th>User</th>
                                            <th>Serwisant</th>
                                            <th>Admin</th>
                                            <th>Zatwierdz</th>
                                            <th>Usuń</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                          @foreach($users as $user)
                
                                            <tr class="text-center">
                                                <form action="{{ route('admin.assign.change') }}" method="post">
                                                <td> {{$i++}}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                                    <td>
                                                            @if($user->banned_until)
                                                            <button type="button" class="btn btn-warning" data-userid={{$user->id}} data-toggle="modal" data-target="#bannie">Tak</button>
                                                                @else
                                                            <button type="button" class="btn btn-success" data-userid={{$user->id}} data-toggle="modal" data-target="#bantak">Nie</button>
                                                            @endif 
                                                        </td>
                                                
                                                <td> <input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                                <td> <input type="checkbox" {{ $user->hasRole('Serwisant') ? 'checked' : '' }} name="role_serwisant"></td>
                                                <td> <input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                                {{ csrf_field() }}
                                                <td><button class="btn btn-primary" type="submit">Dodaj role</button></td>
                
                                            </form>
                                            <td>
                                                    
                                                        <button type="button" class="btn btn-danger" data-userid={{$user->id}} data-toggle="modal" data-target="#delete">Usuń użytkownika</button>
                                                        
                                                      
                                                </td>
                                            </tr>
                
                                          @endforeach
                                    </tbody>
                
                            </table>
                
                        </div>
                    </div>
        </div>
      </div>
    
</div>

<!--Modal delete -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             
            </div>
            <form action="{{route('admin.user.destroy')}}" method="post">
                
                    @csrf
                <div class="modal-body">
                      <p class="text-center">
                          Napewno chcesz usunąć tego użytkownika?
                      </p>
                      <input type="hidden" name="id" id="user_id" value="">
      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Nie, anuluj</button>
                  <button type="submit" class="btn btn-warning">Tak, Usuń</button>
                </div>
            </form>
          </div>
        </div>
      </div>
  
<!--Modal banowanie -->

<div class="modal modal-danger fade" id="bantak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             
            </div>
            <form action="{{route('admin.user.ban')}}" method="post">
                
                    @csrf
                <div class="modal-body">
                      <p class="text-center">
                          Napewno chcesz zbanować tego użytkownika?
                      </p>
                      <input type="hidden" name="id" id="user_id" value="">
      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Nie, anuluj</button>
                  <button type="submit" class="btn btn-warning">Tak, Ban</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <!--Modal odbanuj -->

<div class="modal modal-danger fade" id="bannie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             
            </div>
            <form action="{{route('admin.user.odbanuj')}}" method="post">
                
                    @csrf
                <div class="modal-body">
                      <p class="text-center">
                          Napewno chcesz odbanować tego użytkownika?
                      </p>
                      <input type="hidden" name="id" id="user_id" value="">
      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Nie, anuluj</button>
                  <button type="submit" class="btn btn-warning">Tak, odblokuj</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    

@endsection