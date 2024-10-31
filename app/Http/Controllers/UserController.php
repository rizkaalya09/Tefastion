<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Product;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        $request->validated();
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'seller',
            'phone' => $request->phone,
            'image' => $imageName,
            'address' => $request->address,
        ]);

        Seller::create([
            'seller_id' => $user->id,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();
        $oldImageName = $user->image;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($oldImageName) {
                $oldImagePath = public_path('assets/img/' . $oldImageName);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
        } else {
            $imageName = $oldImageName; // keep the old image if no new image is uploaded
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'image' => $imageName,
            'address' => $request->address,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if ($user->role == 'seller') {
            Product::where('seller_id', $user->id)->delete();
            Seller::where('seller_id', $user->id)->delete();
        }
        if ($user->role == 'customer') {
            Customer::where('customer_id', $user->id)->delete();
        }
        if ($user->image) {
            unlink(public_path('assets/img/' . $user->image));
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
