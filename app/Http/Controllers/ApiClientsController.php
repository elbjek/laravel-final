<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ApiClientsController extends Controller
{
    public function index() 
    {
        $user = \Auth::id();
        $clients = Client::where('clients.user_id', $user)
        ->get();
        return response()->json($clients);
    }


    public function show() 
    {
        $user = \Auth::id();
        
        $clients = Client::where('clients.user_id', $user)
        ->first();
        return response()->json($clients);
    }
}
