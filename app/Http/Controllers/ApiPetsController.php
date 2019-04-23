<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
class ApiPetsController extends Controller
{
    public function index() 
    {
        $pets = Pet::get();
        return response()->json($pets);
    }
}
