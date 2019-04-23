<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\App;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $user = \Auth::user()->id;
        $clients= Client::where('clients.user_id', $user)->get();

            return view('clients', compact('clients'));

    }

    public function create()
    {
        return view('create-client');
    }

    public function show(Client $client)
    {

//        $selected_id = $client->id;
//
//        $client = Client::where('client.id', $selected_id);
//        dd($client);
        return view('single-client', compact('client'));
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect('/clients');
    }

    public function edit(Client $client)
    {
        return view ('edit-client', compact('client'));
    }

    public function update (Request $request, Client $client)
    {
        $id = $client->id;
        $client->update($request->all());
        return redirect('/clients/'.$id);
    }

    public function destroy(Client $client)
    {

        $client->delete();
        return view('clients')->with('success', 'Deleted succesfully!');
    }
}
