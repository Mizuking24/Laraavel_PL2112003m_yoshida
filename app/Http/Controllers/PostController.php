<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use App\Models\Comment;
use  Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();

        $pc = Post::whereMonth('created_at', now());
        $postCount = $pc->get();

        $uc = User::whereMonth('created_at', now());
        $userCount = $uc->get();

        return view('post.index', [
            'posts' => $posts,
            'postCount' => $postCount,
            'userCount' => $userCount,
        ]);

    }

    public function new() {
        return view('post.new');
    }

    public function create(PostRequest $request) {
        $title = $request->input('title');
        $body = $request->input('body');
        $user_id = Auth::id();
        Post::insert([
            "title" => $title,
            "body" => $body,
            "user_id" => $user_id,
        ]);
        return redirect('/posts');
    }

    public function show(Request $request) {
        // 投稿詳細情報取得
        $postData = Post::where('id', $request->id);
        if (!$postData->exists()) {
            abort(404);
        }
        $post = $postData->first();

        $userData = User::where('id', $post->user_id);
        if (!$userData->exists()) {
            abort(404);
        }
        $user = $userData->first();

        $commentsData = Comment::where('post_id', $request->id);
        $comments = $commentsData->get();

        return view('post.show', [
            'post' => $post,
            'user' => $user,
            'comments' => $comments,
        ]);
    }
}
