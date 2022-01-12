<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Menu;
class HomeController extends Controller
{
    public function index(){
        $category = Categories::all();

        return view('home', compact('category'));
    }

    public function search(Request $request){
        $search = $request->search;
        $menu = Menu::where('menu_name', 'like', '%'.$search.'%')->get();

        return view('menu', compact('search', 'menu'));
    }
}
