<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout', ['cart' => $cart]);
    }
    public function add(string $id, Request $req)
    {
        $pro = Product::find($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']+= $req->quantity;
        } else {
            $cart[$id] = [
                'name' => $pro->name,
                'description' => $pro->description,
                'quantity' => $req->quantity,
                'price' => $pro->price,
                'image' => $pro->images->first()->path ?? null,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

}
