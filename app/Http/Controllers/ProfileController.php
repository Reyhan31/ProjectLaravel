<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;
class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function change(Request $request){
        $validate = $request->validate([
            'image' => 'required|image|file'
        ]);

        if($request->file('image')){
            Storage::delete(auth()->user()->image);
            unlink(public_path(auth()->user()->image));
            $validate['image'] = $request->file('image')->store('assets/profile');
            $validate['image'] = 'storage/'.$validate['image'];
        }

        User::where('id', auth()->user()->id)->update([
            'image' => $validate['image']
          ]);

        return back();
    }
}
