<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogAPI extends Controller
{
    //
    function list()
    {
return Post::all();
    }

    function listone($id)
    {
return Post::find($id);
    }
}
