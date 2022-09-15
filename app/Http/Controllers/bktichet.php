<?php

namespace App\Http\Controllers;
use App\Models\BKticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if(auth()->user()->role=='3'){
     return response([
        'buss list'=>Router::where('agence_id',auth()->user()->id)->get()
     ]);
    }
    else{
    return response([
        'message'=>'you are not allowed'
    ]);
    }}

       public function showrout(){
        // if(auth()->user()->role=='2'){
            $router =DB::table('routers')
            ->join('users', 'users.id', '=', 'routers.agence_id')
            ->select('users.name', 'routers.router_name','routers.amount')
            ->get();
     return response([
        'Router list'=>$router
     ]);
    // 
}
}
