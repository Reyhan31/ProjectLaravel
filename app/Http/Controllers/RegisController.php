<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'image' => 'required|image|file',
            'password' => 'required|min:5|max:255'
        ]);

        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('assets/profile');
        }
        
        $validate['password'] = Hash::make($validate['password']);
        $validate['role'] = 1;
        User::create($validate);

        return redirect('/login');
    }
}
