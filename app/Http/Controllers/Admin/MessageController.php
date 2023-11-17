<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();   //trovo l'utente loggato
        $apartments = $user->apartments()->has('messages')->get();

        return view('emails.messages', compact("apartments"));
    }
}
