<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;


class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show']);
  }


  public function index(Posts $posts)
  {

    $posts = $posts->all();

    // $posts = Post::latest()
    // ->filter(request(['month', 'year']))
    // ->get();

    return view('posts.index', compact('posts'));
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
