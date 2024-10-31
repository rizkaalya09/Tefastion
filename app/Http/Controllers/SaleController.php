<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.sales.index', ['sales' => Sale::paginate(10)]);
        } elseif (Auth::user()->role == 'seller') {
            $productIds = Product::where('seller_id', Auth::user()->id)->pluck('id');
            $sale = Sale::whereIn('product_id', $productIds)->paginate(10);
            return view('dashboard.sales.index', ['sales' => $sale]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $request->validated();
        if (Product::find($request->product_id)->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Insufficient stock');
        }
        if (Wallet::find(auth()->user()->customer->wallet->id)->balance < $request->total) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }
        $sale = Sale::create([
            'wallet_id' => auth()->user()->customer->wallet->id,
            'product_id' => $request->product_id,
            'total' => $request->total,
            'quantity' => $request->quantity,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        Transaction::create([
            'wallet_id' => auth()->user()->customer->wallet->id,
            'amount' => $request->total,
            'type' => 'purchase',
            'sale_id' => $sale->id,
        ]);

        Wallet::find(auth()->user()->customer->wallet->id)->update([
            'balance' => Wallet::find(auth()->user()->customer->wallet->id)->balance - $request->total,
        ]);

        Product::find($request->product_id)->update([
            'stock' => Product::find($request->product_id)->stock - $request->quantity,
        ]);

        return redirect()->route('products')->with('success', 'Sale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('dashboard.sales.show', ['sale' => $sale]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
