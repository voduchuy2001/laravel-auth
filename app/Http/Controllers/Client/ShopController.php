<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $products = Product::orderByDesc('created_at')->paginate(6);

        return view('client.shop.index', [
            'products' => $products,
        ]);
    }

    public function show(string $id): View
    {
        $product = Product::findOrFail($id);

        return view('client.shop.show', [
            'product' => $product,
        ]);
    }
}
