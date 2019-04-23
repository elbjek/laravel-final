<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Pet;
use App\Client;
use App\User;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function index () 
    {
        $users = User::get();
        return view('welcome', compact('users'));
    }
}
