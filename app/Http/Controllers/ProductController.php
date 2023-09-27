<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return redirect('/');
    }

    public function list()
    {
        return view('product.list', ['products' => Product::take(10)->get()]);
    }

    public function detail($id, $slug)
    {
        $product = Product::FindOrFail($id);
        $intent = auth()->user()->createSetupIntent();
        return view('product.detail', compact('product', 'intent'));
    }
}
