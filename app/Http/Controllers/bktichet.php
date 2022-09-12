<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BKticket;

class bktichet extends Controller
{
    public function store(request $request){
        if(auth()->user()->role== 3){
        $request->validate(
        [
            'company_id' => 'required'
                
            ]
        );
        BKticket::create([
            'company_id'=>$request->input('company_id'),
            'router_id'=> $request->input('router_id'),
            'buss_id'=>$request->input('buss_id'),
            'user_id'=>auth()->user()->id,
            ]
        );

        return response([
            'results'=>'Router created successfully'
          ]);}
          else{
            return response(['message'=>'you are not allowed to perform this action']);
        }
    }
     //show all routers
     

       public function showAll(){
        if(auth()->user()->role== 3){
            return BKticket::all();
    }
    else{
    return response([
        'message'=>'you are not allowed'
    ]);
    }}}
