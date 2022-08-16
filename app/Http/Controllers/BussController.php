<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buss;
class BussController extends Controller
{
    function buss()
    {
return buss::all();
    }

    public function index()
    {
        //
        $post = Post::all();
        return response()->json([
            'message' => 'success',
            'posts' => $post
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # code...
        $this->validate(
            $request,
            [
                'buss-name' => 'required',
                'driver-name' => 'required',
                'buss-code' => 'required'
            ]
        );
        $post = $request->user()->posts()->create(
            [
                'buss-name' => $request->input('buss-name'),
                'driver-name' => $request->input('driver-name'),
                'buss-code' => $request->input('buss-code'),
            ]
        );

        return response()->json([
            'message' => 'success',
            'post' => $post
        ], 200);
    }
}
