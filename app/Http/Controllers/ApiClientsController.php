<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Pet;

class ApiClientsController extends Controller
{
    public function index() 
    {

        $user = \Auth::id();
        $clients = Client::join ('pets', 'pets.id', '=', 'clients.pet_id')
        ->select('clients.*','name')
        ->where('clients.user_id', $user)
        ->latest('clients.id')
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
    public function create()
    {
        $user = \Auth::id();
        $pets = Pet::pluck('name','id');
        return  compact('user','pets');   
    }

    public function store(Request $request)
    {
        Client::create([
            'client_name' => $request->client_name,
            'client_lastname' => $request->client_lastname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'pet_id' => $request->pet_id,
            'user_id' => \Auth::id()
            ]);  
    }


    public function destroy(Client $client)
    {
        // $appointment = Appointments::find($id);
        $client->delete();
        
    }
}
