<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use  Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function new() {
        return view('post.new');
    }

    public function create(Request $request) {
        $title = $request->input('title');
        $body = $request->input('body');
        $user_id = Auth::id();

        Post::insert([
            "title" => $title,
            "body" => $body,
            "user_id" => $user_id,
        ]);

        return view('post.index');
    }
}
