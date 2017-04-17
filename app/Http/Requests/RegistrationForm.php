<?php

namespace App\Http\Requests;

use Mail;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Email;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    //Validate the form.
    return [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required|confirmed|min:4'
    ];
  }

  public function persist()
  {
    //Create and save the user.

    //SECOND CODE
    $user = User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => bcrypt($this->password)
    ]);

    //The following code works fine - FIRST CODE USED.
    // $user = User::create([
    // 'name' => request('name'),
    // 'email' => request('email'),
    // 'password' => bcrypt(request('password'))
    //]);

    //Sign them in.
    auth()->login($user);


    //\Mail::to($user)->send(new Welcome($user));
  }
}
