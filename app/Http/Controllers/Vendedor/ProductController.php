<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('vendedor.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('vendedor.products.show', compact('product'));
    }
}