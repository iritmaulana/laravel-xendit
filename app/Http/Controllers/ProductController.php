<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
}
