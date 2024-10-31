<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome', ['categories' => Category::all()]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function category(String $id)
    {
        return view('category', ['category' => $id, 'products' => Category::first()->products]);
    }

    public function products()
    {
        //menambahkan fitur pagination
        $products = Product::paginate(10);
        return view('pages.products.index', ['products' => $products]);
    }

    public function product(String $id)
    {
        return view('pages.products.show', ['product' => Product::find($id)]);
    }

    public function checkout(String $id)
    {
        if (Auth::user()->customer->wallet == null) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
        $product = Product::findOrFail($id);
        $quantity = 1; // Default quantity
        return view('pages.products.checkout', compact('product', 'quantity', 'id'));
    }
}
