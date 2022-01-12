<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Categories;
class MenuController extends Controller
{
    public function index($id){
        $menu = Menu::where('category_id', '=' ,$id)->get();
        $category = Categories::where('id', '=', $id)->first();

        return view('menu', compact('menu', 'category'));
    }
}
