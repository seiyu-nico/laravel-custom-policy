<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('post.index', ['posts' => Post::where('user_id', Auth::id())->get()]);
    }

    public function show(int $id): View
    {
        return view('post.show', ['post' => Post::find($id)]);
    }
}
