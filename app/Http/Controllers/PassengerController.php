<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class PassengerController extends Controller
{
    
        function Passenger()
        {
    return Passenger::all();
        }
}
