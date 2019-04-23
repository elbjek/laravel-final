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

//        $user = \Auth::id();
//        dd($user);
//        $appointments = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
//            ->join('users', 'users.id', '=', 'appointments.user_id')
//            ->join('clients', 'clients.id', 'appointments.client_id')
//            ->where('users.id', $user)
//            ->get();

        
        $user = \Auth::id();

        $appointments = User::where('users.id', $user)
            ->join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('pets', 'pets.id','=', 'appointments.pet_id')
            ->first();

            return view('appointments', compact('appointments'));
    }

    public function create()
    {
        return view('create-appointment');

    }

//    public function store(Request $request)
//    {
//        Appointment::create($request->all());
////        return redirect('/appointments');
//    }

    public function show(Appointment $appointment)
    {
        $user = \Auth::id();
        $selected_id = $appointment->id;
        $appointment = Appointment::where('appointments.id', $selected_id)
        ->join('users', 'users.id','=', 'appointments.user_id')
        ->join('pets', 'pets.id', '=', 'appointments.pet_id')
        ->where('appointments.user_id', $user)
        ->get();
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
