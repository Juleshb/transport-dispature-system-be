<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buss;
class BussController extends Controller
{
    
    public function store(request $request){
        if(auth()->user()->role== 2){
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
                'agence_id'=>auth()->user()->id
            ]
        );

        return response([
            'results'=>'buss created successfully'
          ]);}
          else{
            return response(['message'=>'you are not allowed to perform this action']);
        }
    }
     //show all busses
     

       public function showAll(){
        if(auth()->user()->role=='2'){
     return response([
        'buss list'=>buss::where('agence_id',auth()->user()->id)->get()
     ]);
    }
    else{
    return response([
        'message'=>'you are not allowed'
    ]);
    }}}