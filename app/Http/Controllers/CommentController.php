<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\User;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(CommentRequest $request) {
        $comment = $request->input('comment');
        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        $post_id = $request->id;
        Comment::insert([
            "comment" => $comment,
            "user_id" => $user_id,
            "post_id" => $post_id,
            "name" => $user_name,
        ]);
        return redirect()->route('Post.show', ['id' => $post_id]);
    }
}
