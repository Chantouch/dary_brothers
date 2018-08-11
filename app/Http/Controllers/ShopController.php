<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

  public function index() {
  	if (Auth::check()) {
  		$user = User::where('id', Auth::id())->first();
  		return view('shop', ['email' => $user->email]);
  	}
    return view('shop');
  }

}
