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
        $clients= Client::get();
            return view('clients', compact('clients'));

    }

    public function create()
    {
        return view('create-client');
    }

    public function show(Client $client)
    {

        return view('single-client', compact('client'));
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect('/clients');
    }

//    public function edit(Appointment $appointment)
//    {
////        dd($appointment);
//        return view ('edit-appointment', compact('appointment'));
//    }
//
//    public function update (Request $request, Appointment $appointment)
//    {
//        $id = $appointment->id;
//        $appointment->update($request->all());
//        return redirect('/appointments/'.$id);
//    }
//
//    public function destroy(Appointment $appointment)
//    {
//
//        $appointment->delete();
//        return view('appointments')->with('success', 'Deleted succesfully!');
//    }
}
