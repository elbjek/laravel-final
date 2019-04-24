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
        $appointments = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
        ->join('users', 'users.id', '=', 'appointments.user_id')
        ->join('clients', 'clients.id', 'appointments.client_id')
        ->select('appointments.*','client_name','client_lastname','name')
        ->where('users.id', $user)
        ->latest('appointments.id')
        ->get();
        
        return response()->json($appointments);
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
            $appointment = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('clients', 'clients.id', 'appointments.client_id')
            ->select('appointments.*','client_name','client_lastname','name')
            ->where('users.id', $user)
            ->where('appointments.id',$selected_id)
            ->first();
            return response()->json($appointment);
        }
        
        public function edit(Appointment $appointment)
        {
            $user = \Auth::user()->id;
            $pets = Pet::pluck('name','id');
            $clients = Client::pluck('client_name','id');
            $user = \Auth::id();
            $selected_id = $appointment->id;
            $appointment = Appointment::join ('pets', 'pets.id', '=', 'appointments.pet_id')
            ->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('clients', 'clients.id', 'appointments.client_id')
            ->select('appointments.*','client_name','client_lastname','name')
            ->where('users.id', $user)
            ->where('appointments.id',$selected_id)
            ->first();
            return compact('appointment','clients', 'pets', 'user');
        }
        
        public function update (Request $request, Appointment $appointment)
        {

            $id = $appointment->id;
            $appointment->update($request->all());
            return redirect('/appointments/'.$id);
        }

        public function destroy(Appointment $appointment)
        {
            // $appointment = Appointments::find($id);
            $appointment->delete();
            
        }
        
    }
