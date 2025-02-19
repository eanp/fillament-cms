<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now()->timezone('Asia/Jakarta'))
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = Post::where('published_at', '<=', Carbon::now()->timezone('Asia/Jakarta'))
            ->where('slug', $post->slug)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }
}
