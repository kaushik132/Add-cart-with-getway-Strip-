<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 public function googleLogin()
 {
     return Socialite::driver('google')->redirect();
 }




    public function index()
    {
       $user_name = Auth::user()->name;

        return view('home',compact('user_name'));
    }

    public function adminhome()
    {
        $user_name = Auth::user()->name;
        return view('adminhome',compact('user_name'));
    }


    public function page(){
        return view('newpage');
    }
}
