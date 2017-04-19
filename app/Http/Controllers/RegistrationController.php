<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
      return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
      $form->persist();

      //session('message', 'Here is a default message'); - The message exist in the whole session linked to the user.
      session()->flash('message', 'Thanks so much for signing up!');

      //Redirect to the homepage.
      return redirect()->home();

    }
}
