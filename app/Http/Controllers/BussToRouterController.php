<?php

namespace App\Http\Controllers;
use App\Models\BussToRouter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BussToRouterController extends Controller
{
    public function store(request $request){
        if(auth()->user()->role== 2){
        
        buss::create([
                'buss_id' => $request->input('buss_id'),
                'router_id' => $request->input('router_id'),
                'agence_id'=>auth()->user()->id
            ]
        );

        return response([
            'status' => true,
            // 'router'=>DB::table('busses')->select('buss-name')->where('id'=>)->get(),
            'results'=>'Buss assigned successfully'
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
    }}
}
