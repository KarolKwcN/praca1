@extends('master')
@section('content')
<div id="app_message">
<div class="container">
    
        <div class="row">
            <div style="background-color:#fff; margin-right:10px; solid #F5F8FA" class="col-md-3 pull-left">
                <h3 align="center">Użytkownicy</h3>
                <hr>
                <a href="{{url('/nowawiadomosc')}}">
                     Nowa wiadomość</a>
                <ul v-for="privateMsg in privateMsgs">
                <li @click="messages(privateMsg.id)" style="list-style: none; margin-top:10px; background-color:#ddd">@{{privateMsg.name}}</li>
                </ul>
                    <hr>
            </div>
        
            <div style="background-color:#fff; min-height:600px; margin-right:10px; solid #F5F8FA" class="col-md-6">
                    <h3 align="center">Wiadomości</h3>
                    <div v-for="singleMsg in singleMsgs">
                            
                        <div v-if="singleMsg.user_from == <?php echo Auth::user()->id; ?>">
                                
                            <div style="float:right; background-color:#0084ff ; padding:5px 15px 5px 15px;
                                margin:10px; text-align:left; color:#fff; border-radius:10px;"
                                class="col-md-6">
                                     Ja:@{{singleMsg.msg}}
                            </div>
                        </div>
                        
                         <div v-else>
                            <div style="float:left; background-color:#F0F0F0; padding:5px 15px 5px 15px;
                            margin:10px;color:#333 ; border-radius:10px" 
                            class="col-md-6">
                            @{{singleMsg.name}} @{{singleMsg.msg}}
                         </div>
                         </div>
                         
                    </div>
                    <hr>
                    <input type="hidden" v-model="conID">
                    <textarea class="col-md-12 form-control;" v-model="msgFrom" @keydown="inputHandler"
                    style="margin-top:15px; border:none;"></textarea>
                    
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