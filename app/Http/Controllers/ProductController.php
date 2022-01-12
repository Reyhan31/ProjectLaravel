<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Menu;
class ProductController extends Controller
{
    public function index(){
        $category = Categories::all();
        return view('Admin.addProduct', compact('category'));
    }

    public function store(Request $request){
        
        $validate = $request->validate([
            'category_id' => 'required|not_in:0',
            'menu_name' => 'required',
            'menu_price' => 'required|integer|min:10000',
            'menu_image' => 'required|image|file|max:1024'
        ]);

        if($request->file('menu_image')){
            $validate['menu_image'] = $request->file('menu_image')->store('assets');
        }

        Menu::create($validate);
        return back()->with('condition', 'Add product Success');
    }
}
