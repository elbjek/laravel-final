<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
class ApiPetsController extends Controller
{
    public function index() 
    {
        $user = \Auth::id();
        $pets = Pet::where('pets.user_id', $user)
        ->get();
        return response()->json($pets);
    }

    public function show(Pet $pet) 
    {
        $user = \Auth::id();
        $selected_id = $pet->id;
        $pet = Pet::where('pets.user_id', $user)
        ->where('pets.id', $selected_id)
        ->first();
        return response()->json($pet);
    }

    public function edit(Pet $pet) 
    {
        $user = \Auth::id();
        $selected_id = $pet->id;
        $pet = Pet::where('pets.user_id', $user)
        ->where('pets.id', $selected_id)
        ->first();
        return response()->json($pet);
    }
    public function update (Request $request, Pet $pet)
    {

        $id = $pet->id;
        $pet->update($request->all());
        // return redirect('/appointments/'.$id);
    }
    public function destroy(Pet $pet)
    {
        // $appointment = Appointments::find($id);
        $pet->delete();
    }
}
