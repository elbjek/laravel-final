<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pet;
use App\Client;
use App\Appointment;
use Illuminate\Support\Facades\App;

class ApiAppointmentController extends Controller
{
    public function index()
    {
        $user = \Auth::id();

        $appointments = User::where('users.id', $user)
            ->join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('pets', 'pets.id','=', 'appointments.pet_id')
            ->join('clients', 'clients.id','=', 'appointments.client_id')
            ->latest('appointments.id')
            ->get();
        return (compact('appointments'));
    }

    public function create()
    {
        $user = \Auth::id();
        $pets = Pet::pluck('name','id');
        $clients = Client::pluck('client_name','id');
        return  compact('user','pets','clients');

    }

    public function store(Request $request)
    {
        Appointment::create([
            'title' => $request->title,
            'description' => $request->description,
            'client_id' => $request->client_id,
            'pet_id' => $request->pet_id,
            'user_id' => \Auth::id()
        ]);
        return redirect('/appointments');
    }

    public function show(Appointment $appointment)
    {
        $user = \Auth::id();
        $selected_id = $appointment->id;
        $appointment = User::where('appointments.id', $selected_id)
            ->join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('clients','clients.id','=','appointments.client_id')
            ->join('pets', 'pets.id','=', 'appointments.pet_id')
            ->first();

        return response()->json($appointment);
    }

}
