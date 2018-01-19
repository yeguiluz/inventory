<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function list()
  {
      $users = User::all();
      return json_encode(['usr' => $users]);
  }
  public function store(Request $request)
  {
    $user = new User($request->all());
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->route('users');
  }
}
