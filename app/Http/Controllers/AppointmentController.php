<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Appointment;
use App\Pet;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $user = \Auth::user()->id;
        $appointments = Appointment::join('pets', 'pets.id', '=', 'appointments.pet_id')
            ->join('clients', 'pets.client_id', '=', 'clients.id')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->where('appointments.user_id', $user)
            ->orderby('title')
            ->get();

//        dd($appointments);
        return view('appointments', compact('appointments', 'pets'));
    }

    public function create()
    {
        return view('create-appointment');
    }

    public function show(Appointment $appointment)
    {
        $selected_id = $appointment->id;
        $appointments = Appointment::where('appointments.id', $selected_id)
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('pets', 'pets.id', '=', 'appointments.pet_id')
            ->get();
        return view('single-appointment', compact('appointments'));
    }

    public function store(Request $request)
    {
        Appointment::create($request->all());
        return redirect('/appointments');
    }

    public function edit(Appointment $appointment)
    {
//        dd($appointment);
        return view ('edit-appointment', compact('appointment'));
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
