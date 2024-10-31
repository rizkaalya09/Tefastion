<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
}
