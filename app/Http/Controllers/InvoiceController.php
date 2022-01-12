<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Cart;

class InvoiceController extends Controller
{
    public function index(){
        $invoice = Invoice::where('user_id', auth()->user()->id)->get();
        return view('invoice', compact('invoice'));
    }

    public function store(){
        $invoice['user_id'] = auth()->user()->id;
        Invoice::create($invoice);

        $id = Invoice::where('user_id', auth()->user()->id)->latest('id')->first();

        $cart = Cart::where('user_id', auth()->user()->id)->get();

        foreach($cart as $c){
            $detail['menu_name'] = $c->menu_name;
            $detail['menu_price'] = $c->menu_price;
            $detail['invoice_id'] = $id->id;

            InvoiceDetail::create($detail);
            Cart::where('id', $c->id)->delete();
        }
        
        $invoice = Invoice::where('user_id', auth()->user()->id)->get();
        return view('invoice', compact('invoice'));
    }

    public function detail(Request $request){
        $id = $request->id;
        $detail = invoiceDetail::where('invoice_id', $id)->get();

        return view('invoiceDetail', compact('detail'));
    }
}
