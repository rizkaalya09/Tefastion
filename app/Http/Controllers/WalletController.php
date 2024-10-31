<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.wallets.index', [
            'wallet' => Wallet::find(Auth::user()->customer->wallet->id),
            'last_transactions' => Wallet::find(Auth::user()->customer->wallet->id)->transactions->last(),
            'transactions' => Wallet::find(Auth::user()->customer->wallet->id)->transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        $request->validated();
        Wallet::create([
            'customer_id' => auth()->user()->customer->customer_id,
            'balance' => $request->balance
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }

    /**
     * Show form Top up the wallet balance.
     */
    public function deposite()
    {
        return view('pages.wallets.deposite');
    }

    /**
     * Store the wallet balance.
     */
    public function storeDeposite(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric|min:1'
        ]);

        $wallet = Wallet::find(Auth::user()->customer->wallet->id);
        $wallet->balance += $request->balance;
        $wallet->save();

        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->balance,
            'type' => 'deposite'
        ]);

        return redirect()->route('wallets.index')->with('success', 'Wallet balance updated successfully.');
    }
}
