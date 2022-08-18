<?php

namespace App\Http\Controllers;


use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AgenceController extends Controller
{
    public function store(request $request){
      if(auth()->user()->role== 1){
        $request->validate(
        ['company_name'=>'required',
        'company_Admin'=>'required',
        'company_Code'=>'required',
        'password'=>'required',
        'company_OwnershipType'=>'required']);
        Agence::create([
            'company_name'=>$request->company_name,
            'company_Admin'=>$request->company_Admin,
            'company_Code'=>$request->company_Code,
           'password'=>hash::make($request->password),
           'company_OwnershipType'=>$request->company_OwnershipType
        ]);
     return response([
       'results'=>'company recorded successfully'
     ]);
    }
    else{
      return response(['message'=>'you are not allowed to perform this action']);
  }
  }
    //show all companies
    public function showAll(){
     return response([
        'companies list'=>Agence::all()
     ]);
    }
    //update companies
    public function update(company $company,request $request){

     $company->update($request->all());
     return response([
       'updated results'=>$company
     ]);
    }





    //company admin login

    public function AdminLogin(request $request){
    $request->validate([
        'company_Admin'=>'required',
        'password'=>'required'
    ]);
    if(Auth()->guard('company')->attempt([
        'company_Admin'=>$request->company_Admin,
        'password'=>$request->password,]))
        {

        $Admin= Agence::where('company_Admin',$request->company_Admin)->first();
        $token=$Admin->createToken('AdminToken',['agences'])->plainTextToken;
        return response([
            'name'=>$Admin->company_name,
            'TOKEN'=>$token]);
        }else
        {
       return response([
        'status'=>'false',
        'message'=>'admin name and password are not valid'
       ]);
    }

  }
}