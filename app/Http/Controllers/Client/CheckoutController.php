<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public float $amount = 0;

    public function index(): View
    {
        $products = Cart::where('user_id', Auth::id())
            ->get();

        foreach ($products as $product) {
            $this->amount += $product->quantity * $product->product->price;
        }

        return view('client.checkout.index', [
            'products' => $products,
            'amount' => $this->amount,
        ]);
    }
}
