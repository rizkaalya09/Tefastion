<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Jika user adalah seller, hanya ambil produk yang dijual oleh seller tersebut
        if (Auth::user()->role == 'seller') {
            $products = Product::where('seller_id', Auth::user()->id)->paginate(10);
        } else {
            // Jika user bukan seller, ambil semua produk
            $products = Product::with('seller.user', 'category')->paginate(10);
        }

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();

        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'seller_id' => auth()->id(),
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/img'), $imageName);

                Image::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('category', 'seller.user')->findOrFail($id);

        if (Auth::user()->role == 'admin') {
            $seller = $product->seller->user;
            return view('dashboard.products.show', compact('product', 'seller'));
        } elseif (Auth::user()->role == 'seller') {
            // Hitung total penjualan dan jumlah total
            $totalSales = $product->sales->count();
            $totalQuantity = $product->sales->sum('quantity');
            $totalRevenue = $product->sales->sum(function ($sale) {
                return $sale->quantity * $sale->price;
            });
            return view('dashboard.products.show', compact('product', 'totalSales', 'totalQuantity', 'totalRevenue'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('dashboard.products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        $imageName = null;
        // Cek jika ada file gambar diupload
        if ($request->hasFile('image')) {
            // Ambil file gambar
            $image = $request->file('image');

            // Buat nama file berdasarkan title dan ekstensi asli
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($product->image) {
                $oldImagePath = public_path('assets/images/' . $product->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Simpan gambar baru ke public/assets/images
            $image->move(public_path('assets/images'), $imageName);

            // Tambahkan nama file gambar baru ke data
            $request->merge(['image' => $imageName]);
        }

        // Update workout di database dengan data baru
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
