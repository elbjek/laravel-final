<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
            ->get();
        return (compact('appointments'));
    }

    public function create()
    {
        return view('create-appointment');

    }

    public function store(Request $request)
    {
        return response()->json([$request->all()]);
    }

    public function show(Appointment $appointment)
    {
        $user = \Auth::id();
        $selected_id = $appointment->id;
        $appointment = User::where('appointments.id', $selected_id)
            ->where('users.id', 1)
            ->join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('pets', 'pets.id','=', 'appointments.pet_id')
            ->first();

        return response()->json($appointment);
    }

}
