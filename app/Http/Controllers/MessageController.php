<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
use App\notifcations;
use App\User;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
        $conID = $request->conID;
        $msg = $request->msg;


        $fetch_userTo= DB::table('messages')->where('conversation_id', $conID)
        ->where('user_to', '!=', Auth::user()->id)
        ->get();

        $userTo = $fetch_userTo[0]->user_to;

        //wysylanie wiadomosci
        $sendM = DB::table('messages')->insert([
            'user_to' => $userTo,
            'user_from' => Auth::user()->id,
            'msg' => $msg,
            'status' => 1,
            'conversation_id' => $conID
        ]);
        if($sendM){
                $userMsg = DB::table('messages')
                ->join('users','users.id','messages.user_from')
                ->where('messages.conversation_id', $conID)->get();
                return $userMsg;
        }
    }
}
