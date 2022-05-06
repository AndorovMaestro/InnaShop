<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function showLogin(){
      return view ('login');
  }


    public function useLogin(Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
    }

        public function useLogout(){
            Auth::logout();
            return redirect()->intended('/') ;
        }

        public function createAccount(){
      return view("CreateAccount");
        }

        public function createAccountPost(Request $request){
      $credentials =$request->validate ([
          "name"=>['required'],
          'email' => ['required',"unique:".User::class, 'email'],
          'password' => ['required'],
      ]);
//           User::create(
//               [
//                   "name"=>$credentials["name"],
//                   "email"=>$credentials["email"],
//                   "password"=>Hash::make($credentials["password"]),
//                   "user_role"=>User::ROLE_USER
//               ]
//           );
            $user=new User();
            $user->name=$credentials["name"];
            $user->email=$credentials['email'];
            $user->password=Hash::make($credentials['password']);
            $user->user_role=User::ROLE_USER;
            $user->save();
           return redirect()->intended('/');
        }
}
