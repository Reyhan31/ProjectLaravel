<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\User;
use Str;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed!!!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function github(){
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(){

        try{
            $user = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('login')->with('loginError', 'Login Failed!!!');
        }

        $user = User::firstorCreate([
            'email' => $user->email
        ],[
            'name' => $user->nickname,
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => Hash::make(Str::random(24)),
            'role' => 1,
            'image' => $user->avatar
        ]);

        try{
            Auth::login($user);
        } catch (\Exception $e) {
            return redirect('login')->with('loginError', 'Login Failed!!!');
        }

        return redirect('/');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){

        try{
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('login')->with('loginError', 'Login Failed!!!');
        }

        $user = User::firstorCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => Hash::make(Str::random(24)),
            'role' => 1,
            'image' => $user->avatar
        ]);

        try{
            Auth::login($user);
        } catch (\Exception $e) {
            return redirect('login')->with('loginError', 'Login Failed!!!');
        }

        return redirect('/');
    }




}
