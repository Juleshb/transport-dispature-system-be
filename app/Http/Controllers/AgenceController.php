<?php

namespace App\Http\Controllers;


use App\Models\Agence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        'company_Email'=>'required',
        'company_OwnershipType'=>'required']);
        Agence::create([
            'company_name'=>$request->company_name,
            'company_Admin'=>$request->company_Admin,
            'company_Code'=>$request->company_Code,
            'company_Email'=>$request->company_Email,
           'company_OwnershipType'=>$request->company_OwnershipType,
           
           
        ]);
        User::create([
          'name' => $request->company_name,
          'email' => $request->company_Email,
          'password' => Hash::make($request->password),
          'role'=>2
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
      if(auth()->user()->role== 1){
     return response([
        'companies list'=>Agence::all()
     ]);
    }
    else{
      return response(['message'=>'you are not allowed to perform this action']);
  }
  }
    //update companies
    public function update(Agence $company,request $request){
      if(auth()->user()->role== 1){


     $company->update($request->all());
     return response([
       'updated results'=>$company
     ]);
    }
    else{
      return response(['message'=>'you are not allowed to perform this action']);
  }
  }





    //company admin login

    public function AdminLogin(request $request){
    $request->validate([
        'company_Admin'=>'required',
        'password'=>'required'
    ]);
    if(Auth()->guard('Agence')->attempt([
        'company_Admin'=>$request->company_Admin,
        'password'=>$request->password,]))
        {

        $Admin= Auth::Agence();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'name'=>$Admin->company_name,
            'TOKEN'=>$token])->withCookie($cookie);
        }else
        {
       return response([
        'status'=>'false',
        'message'=>'admin name and password are not valid'
       ]);
    }

  }
  public function logout(request $request){
    auth::guard('Agence')->logout();
    return response([
    'message'=>'you are logged out']);
  }
}