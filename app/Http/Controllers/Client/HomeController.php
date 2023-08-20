<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products =  Product::orderByDesc('created_at')->take(6)->get();

        return view('client.home.index', [
            'products' => $products,
        ]);
    }
}
