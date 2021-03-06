<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Appointment;
use App\Pet;
use App\Client;
use App\User;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{


    public function index() {

       $user = \Auth::id();
       $appointments = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
           ->join('users', 'users.id', '=', 'appointments.user_id')
           ->join('clients', 'clients.id', 'appointments.client_id')
           ->select('appointments.*','client_name','client_lastname','name')
           ->where('users.id', $user)
           ->get();
        return view('appointments', compact('appointments'));
    }

    public function create()
    {
        $user = \Auth::id();
        $pets = Pet::pluck('name','id');
        $clients = Client::pluck('client_name','id');
        // dd($clients);
        return view('create-appointment', compact('pets', 'clients', 'user'));

    }

   public function store(Request $request)
   {
       Appointment::create($request->all());
       return view('appointments');
   }

    public function show(Appointment $appointment)
    {
        $user = \Auth::id();
        $selected_id = $appointment->id;
        $appointment = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
        ->join('users', 'users.id', '=', 'appointments.user_id')
        ->join('clients', 'clients.id', 'appointments.client_id')
        ->select('appointments.*','client_name','client_lastname','name')
        ->where('users.id', $user)
        ->where('appointments.id',$selected_id)
        ->first();
        return view('single-appointment', compact('appointment'));
    }
    public function edit(Appointment $appointment)
    {
        $user = \Auth::user()->id;
        $pets = Pet::pluck('name','id');
        $clients = Client::pluck('client_name','id');

        return view ('edit-appointment', compact('appointment','clients', 'pets', 'user'));
    }

    public function update (Request $request, Appointment $appointment)
    {
        $id = $appointment->id;
        $appointment->update($request->all());
        return redirect('/appointments/'.$id);
    }

    public function destroy(Appointment $appointment)
    {

        $appointment->delete();
        return view('appointments')->with('success', 'Deleted succesfully!');
    }
}
