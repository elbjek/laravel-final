<?php

namespace App\Http\Controllers;

use App\Client;
use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $pets= Pet::get();
        return view('pets', compact('pets'));
    }

    public function create()
    {
        $clients = Client::get();
//        dd($clients);
        $user = \Auth::user();
        return view('create-pet', compact('clients'));
    }

    public function show(Pet $pet)
    {
        return view('single-pet', compact('pet'));
    }

    public function store(Request $request)
    {
        Pet::create($request->all());
        return view('pets');
    }

    public function edit(Pet $pet)
    {
        $clients = Client::pluck('first_name', 'id');
        return view ('edit-pet', compact('pet', 'clients'));
    }

    public function update (Request $request, Pet $pet)
    {
        $id = $pet->id;
        $pet->update($request->all());
//        dd($query);
        return redirect('/pets/'.$id);
    }

    public function destroy(Pet $pet)
    {

        $pet->delete();
        return view('pets')->with('success', 'Deleted succesfully!');
    }
}
