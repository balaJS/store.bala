<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Products extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function index()
    {
        return redirect('/');
    }

    public function list()
    {
        return view('product.list', ['products' => $this->model->take(10)->get()]);
    }

    public function detail($id, $slug)
    {
        return view('product.detail', ['product' => $this->model->FindOrFail($id)]);
    }
}
