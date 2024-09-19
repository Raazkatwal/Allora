<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->all();
        return $cart;
    }
    public function add(string $id, Request $req)
    {
        $pro = Product::find($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
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
        return redirect()->route('cart');
    }
}
