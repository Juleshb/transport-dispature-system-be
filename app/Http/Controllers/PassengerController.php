<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
    
        function Passenger()
        {
    return Passenger::all();
        }

        public function passengerregister(Request $request)
    {
         Passenger::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'message' => 'success',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>3
        ]);
        return response([
            'results'=>'you are registed now'
          ]);
        
    }

}
