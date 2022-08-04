<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    
        function Passenger()
        {
    return Passenger::all();
        }

        public function passengerregister(Request $request)
    {
        return  Passenger::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'message' => 'success',
        ]);
        
    }

}
