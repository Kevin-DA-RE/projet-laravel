<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create ()
    {
        return view('blog.create');
    }

    public function store(Request $request){
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title'))
        ]);
        return redirect()->route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
    }

    
    public function index (): View {
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    public function show (string $slug, Post $post): RedirectResponse|View
    {
        if ($post->slug !== $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
