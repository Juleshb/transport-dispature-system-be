<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buss;
class BussController extends Controller
{
    
    public function store(request $request){
        $request->validate(
        [
                'buss-name' => 'required',
                'driver-name' => 'required',
                'buss-code' => 'required'
            ]
        );
        buss::create([
                'buss-name' => $request->input('buss-name'),
                'driver-name' => $request->input('driver-name'),
                'buss-code' => $request->input('buss-code'),
            ]
        );

        return response([
            'results'=>'buss successfully'
          ]);
    }
}
