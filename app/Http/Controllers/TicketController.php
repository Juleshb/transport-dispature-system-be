<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agence;
use App\Models\Router;
use App\Models\buss;
use Faker\Provider\BKticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class TicketController extends Controller
{
    function Ticket()
    {
return BKticket::all();
    }

    public function store(request $request){
        if(auth()->user()->role== 3){
            $request->validate(
                [
                        'company_id' => 'required'
                        
                        
                ]);
            BKticket::create([
            'user_id'=>auth()->user()->id,
            'company_id'=>$request->input('company_id'),
            'router_id'=> $request->input('router_id'),
            'buss_id'=>$request->input('buss_id'),
        ]);

        $user = Auth::user();
        $agence = $request->input('company_id');
        $router = $request->input('router_id');
        $buss = $request->input('buss_id');
        return response([
            'status' => true,
                'user'=>$user->name,
                'Agence name'=>DB::table('agences')->select('company_name')->where('id',$agence)->get(),
                'Router'=>DB::table('routers')->select('router_name','amount')->where('id',$router)->get(),
                'Buss'=>DB::table('busses')->select('buss-name','buss-code',)->where('id',$buss)->get(),
                'message' => 'your tichet has created',

        ]);
    }
    else{
        return response(['message'=>'you are not allowed']);
    }}
}
