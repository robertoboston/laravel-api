<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class Postcontroller extends Controller
{
    public function index(Request $request){
        $posts = Post::with('category','tags')->paginate(6);
        return response()->json([
            'success'  => true,
            'posts'    =>$posts
        ]);
    }

    public function show($slug){
        $post = Post::with('category','tags')->where('slug',$slug)->first();

        if($post){
            return response()->json([
                'success'  => true,
                'post'     => $post
            ]);
        }
        else{
            return response()->json([
                'success'  => true,
                'error'    => 'Nessun post trovato'
            ]);
        }
    }
}
