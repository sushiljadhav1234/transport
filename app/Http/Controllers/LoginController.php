<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
      
       $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('emailid', $request->email)->get();
        $encryptedpassword=$user[0]->password;
       
        $userpass=Crypt::decryptString( $encryptedpassword);     
       
        if($userpass==$request->password){
           $user= Auth::loginUsingId($user[0]->id);
           return redirect()->intended('dashboard')->withSuccess('Signed in');
        }else{
           
            return redirect("login")->withErrors('Login details are not valid');
        }
       
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
