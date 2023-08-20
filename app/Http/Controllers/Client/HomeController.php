<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products =  Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('client.home.index', compact('products'));
    }

    public function shop(): View
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('client.shop.index', compact('products'));
    }
}
