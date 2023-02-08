<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products =  Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('client.home.index', compact('products'));
    }

    public function shop()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('client.shop.index', compact('products'));
    }
}
