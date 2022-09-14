<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class SystemUsersController extends Controller
{
    public function loginUser(Request $request)
    {
    $request->validate([
       'email'=>'required|email',
       'password'=>'required'
     ]);


     if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

             $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);

            return response([
                'status' => true,
                'user'=>$user->name,
                'rore id'=>$user->role,
                'role_title'=>DB::table('roles')->select('role_name')->where('id',$user->role)->get(),
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken('sanctumToken')->plainTextToken 
            ])->withCookie($cookie);

        }



    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        return response()->json(['message' => 'you are logged out'], 200);
    }

public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required'],
        'role'=>'required'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role'=>$request->role,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return response([
        'status'=>'user created'
    ]);
}
public function rolestore(request $request){
$request->validate([
    'role_name'=>'required'
]);
Role::create([
    'role_name'=>$request->role_name
]);
return response([
'message'=>'new role added'
]);
}
public function showAllrole(){
    $role= Role::all();
    return response([
     'message'=>$role
    ]);
}
public function allusers()
{
    $users= User::all();
    return response([
     'message'=>$users
    ]);
}
}
