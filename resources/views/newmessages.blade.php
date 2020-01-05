@extends('master')
@section('content')
<div id="app_message">
<div class="container">
    
        <div class="row">
            <div style="background-color:#fff; margin-right:10px; solid #F5F8FA" class="col-md-3 pull-left">
                <h3 align="center">Użytkownicyy</h3>
                <hr>
                @foreach($Users as $User)
                <li  @click="userID({{$User->id}})" v-on:click="seen = true" style="list-style: none; margin-top:10px; background-color:#ddd">{{$User->name}}</li>
                @endforeach
                    <hr>
            </div>
        
            <div style="background-color:#fff; min-height:600px; margin-right:10px; solid #F5F8FA" class="col-md-6">
                    <h3 align="center">Wiadomość</h3>
                    <hr>
                    <div  v-if="seen">
                        <input type="hidden" v-model="user_id">
                        <textarea class="col-md-12 form-control" v-model="newMsgFrom"></textarea><br>
                        <input type="button" value="Wyślij wiadomość" @click="sendNewMsg()">
                    </div>
                    
            </div>

            <div class="col-md-2 left-sidebar">
                        <h3 align="center">Lewa strona</h3>
                        <hr>
            </div>
        
        </div>
</div>
</div>
    <style>
        .left-sidebar, .right-sidebar{
            background-color: #fff;
            min-height: 600px;
        }
      
    </style>
    <script type="text/javascript" src="/js/profile.js"></script>
  
@endsection