<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class Postcontroller extends Controller
{
    public function index(){
        $posts = Post::with('category','tags')->paginate(6);
        return response()->json([
            'success'  => true,
            'posts'    =>$posts
        ]);
    }
}
