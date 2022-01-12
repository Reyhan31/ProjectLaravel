<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;
class CartController extends Controller

{
    public function store(Request $request){

        $id = $request->id;

        $menu = Menu::where('id', $id)->first();

        $cart['menu_name'] = $menu->menu_name;
        $cart['menu_price'] = $menu->menu_price;
        $cart['user_id'] = auth()->user()->id;

        Cart::create($cart);

        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('cart', compact('cart'));

    }

    public function index(){
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('cart', compact('cart'));
    }

    public function delete(Request $request){

        Cart::where('id', $request->id)->delete();

        return back();
    }
}
