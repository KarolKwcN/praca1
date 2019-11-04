@extends('master')

@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <h3 class="text-info">Użytkownicy</h3>
        </div>
    </div>
        <hr class="bg-info">
   
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-info text-light">
                            <th>Lp.</th>
                            <th>Imię</th>
                            <th>E-Mail</th>
                            <th>Rola</th>
                            <th>Ban</th>
                            <th>Zarządzaj</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                          @foreach($users as $user)

                            <tr class="text-center">
                                
                                <td> {{$i++}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                <td> @if($user->hasRole('User')) 
                                                User
                                        @endif
                                    @if($user->hasRole('Serwisant')) 
                                                | Serwisant
                                        @endif 
                                    @if($user->hasRole('Admin')) 
                                                | Admin
                                        @endif 
                                </td>
                                <td>
                                    @if($user->banned_until)
                                        Tak
                                        @else
                                        Nie
                                    @endif 
                                    
                                </td>
                                <td>

                                    <button class="open-homeEvents" data-id="{{$user->id}}"  data-toggle="modal" data-target="#edit"> <i class="far fa-id-card"></i></button></td>
                                
                            </tr>

                          @endforeach
                    </tbody>

            </table>

        </div>
    </div>
</div>
    <!--Okno zarządzania użytkownikiem -->

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Zarządzaj użytkownikiem</h5>
                    <button tpe="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body p-4">
            <form action="{{ route('admin.assign.change') }}" method="post">
                {{ csrf_field() }}
            <table class="table table-striped">
                <input type="hidden" name="eventId" id="eventId"/>
            <span id="idHolder"></span> 
                  <thead>
                    <tr class="text-center">
                      <th scope="col">User</th>
                      <th scope="col">Serwisant</th>
                      <th scope="col">Admin</th>
                    </tr>
                  </thead>
              
                  <tbody>
    
                  <tr class="text-center">
                    
                      <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                      <td><input type="checkbox" {{ $user->hasRole('Serwisant') ? 'checked' : '' }} name="role_serwisant"></td>
                      <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                       
                    </tr>
                </tbody>

            </table>
            <button class="btn btn-info btn-block btn-lg"  type="submit">Dodaj role</button>
                </form>
                <form action="{{route('admin.user.ban')}}" method="post">
                        @csrf
                        <br>
                        <button type="submit" style="margin-bottom:5px" class="btn btn-danger btn-lg btn-block">Ban</button>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </form>
                   
                    </div>
                    </div>
            </div>
        </div>


    

     <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
    <table>
        <thead>
        <th>Imię</th>
        <th>E-Mail</th>
        <th>User</th>
        <th>Serwisant</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
        <div class="row">
            <tr style="border-bottom: 10px solid #FFFFFF;">
                <form action="{{ route('admin.assign.change') }}" method="post">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Serwisant') ? 'checked' : '' }} name="role_serwisant"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><button class="btn-primary" type="submit">Dodaj role</button></td>

                </form>
                <td>
                    <form action="{{route('admin.user.destroy')}}" method="post">
                        @csrf
                        <button onclick="del({{$user->id}})" type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </form>
                </td>

                <td>
                    <form action="{{route('admin.user.ban')}}" method="post">
                        @csrf
                       
                        <button type="submit" class="btn btn-warning">Ban</button>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </form>
                </td>

            </tr>

        </div>
        @endforeach

        </tbody>
    </table>
</div>
</div>
<script type="text/javascript">
    function del(id){
        alert(id);
    }
</script>
<script>
$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
});
</script>
<script>
var userId; // global
function myfunction(id){
    userId = id;
    $("#edit").modal("show");
    alert(id);
    modal.find('.modal-body #userId').val(userId);
}
</script>
@endsection