<?php

namespace App\Http\Controllers;

use Auth;
use App\Customer;
use App\User;
use App\Http\Controllers\Auth\RegisterController;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends RegisterController
{
    public function createUser() {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $data = array("email" => $email, "password" => $password);
      $result = parent::create($data);
      if ($result['result'] == true) {
          $user = User::where('email', $email)->first();
          session(['CUSTOMER_USER_ID' => $user->id]);
          if (Auth::attempt($data)) {
              return view('homepage', ['email' => $email]);
          }
      } else if ($result['result'] == false) {
        return redirect()->back()->with('alert', $result['msg']);
      }
      return redirect()->back()->with('alert', 'Create Account Failed! Please try again!');
    }
    
    public function createUserDetail() {
      // $customer = new Customer;
      // $customer->first_name = $_POST['first_name'];
      // $customer->last_name = $_POST['last_name'];
      // $customer->age = $_POST['age'];
      // $customer->gender = $_POST['gender'];
      // $customer->phone = $_POST['phone'];
      // $customer->address = $_POST['address'];
      // $customer->user_id = 1;
      // $customer->save();
    }

}
