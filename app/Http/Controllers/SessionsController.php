<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest', ['except' => 'destroy']);
  }

  public function create()
  {
    return view('sessions.create');
  }

  public function store()
  {
    //Attempt to authenticate the user.
    if(! auth()->attempt(request(['email', 'password']))) {
      //If not, redirect back.
      return back()->withErrors([
        'message' => 'The email does not exist in database or the password is wrong.'
      ]);
    }
    //If so, sign them in. (Attempt method do this automatically)
    return redirect()->home();
  }

  public function destroy()
  {
    auth()->logout();
    return redirect()->home();
  }
}
