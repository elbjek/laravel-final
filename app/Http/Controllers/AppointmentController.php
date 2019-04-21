<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Pet;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::join('pets', 'pets.id', '=', 'appointments.pet_id')
            ->join('clients', 'pets.client_id', '=', 'clients.id')->orderby('title')->get();
        return view('appointments', compact('appointments'));
    }

    public function create()
    {
        return view('create-appointment');
    }

    public function show(Appointment $appointment, Pet $pet)
    {
        dd($pet);
        $id = $appointment->id;

        return view('single-appointment', compact('appointment'));
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
