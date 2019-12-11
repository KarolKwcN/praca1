<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        return view('message');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessages(Request $request)
    {
        auth()->user()->messages()->create(['message'=>$request->message]);
        broadcast(new MessageSent(auth()->user(), $request->message))->toOthers();

        return response(['status'=>'Wiadomość została wysłana.']);
    }
}
