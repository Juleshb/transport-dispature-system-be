<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    function Ticket()
    {
return Ticket::all();
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
                'title' => 'required|max:200',
                'content' => 'required|min:10',
                'image' => 'required'
            ]
        );
        $imagePath = $request->image->store('/uploads', 'public');
        $post = $request->user()->posts()->create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath
            ]
        );

        return response()->json([
            'message' => 'success',
            'post' => $post
        ], 200);
    }
}
