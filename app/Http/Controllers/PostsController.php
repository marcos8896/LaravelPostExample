<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Post;


class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }


  public function index()
  {
    $posts = Post::latest()
    ->filter(request(['month', 'year']))
    ->get();
    
    //Temporary
    $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    ->groupBy('year', 'month')
    ->orderByRaw('min(created_at) desc')
    ->get()
    ->toArray();

    return view('posts.index', compact('posts', 'archives'));
  }


  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store()
  {
    //Here is where we create a new post using the request database,
    // $post = new Post;
    //
    //
    // $post->title = request('title');
    // $post->body = request('body');
    //
    // // dd(request(['title','body']));
    //
    // //We'll save within the database
    // $post->save();

    $this->validate(request(), [
      'title' => 'required|max:255',
      'body' => 'required'
    ]);

    auth()->user()->publish(
      new Post(request(['title', 'body']))
    );

    //And then redirect to the homepage.
    return redirect('/');
  }

}
