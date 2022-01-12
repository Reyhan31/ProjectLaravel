<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
        if(auth()->user()->role == 1){
            return back();
        }

        $user = User::where('role', 1)->paginate(10);
        return view('Admin.userData', compact('user'));
    }

    public function delete(Request $request){
        User::where('id', $request->id)->delete();

        return back();
    }

    public function update(Request $request){
        User::where('id', $request->id)->update([
            'role' => 2
          ]);

        return back();
    }
}
