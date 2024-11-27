<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list()
    {
        $users = User::get();
        $products = DB::table('products')->get();
        return view('table', [
            'users' => $users,
            'products' => $products
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|numeric',
        ]);
        User::create($validatedData);
        return redirect()->route('user.create')
            ->with('success', 'User created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|:users,email',
            'phone_number' => 'nullable|numeric',
        ]);
        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('user.table')
            ->with('success', 'User updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.table')
            ->with('success', 'User deleted successfully.');
    }
    public function create_product()
    {
        return view('create_product', []);
    }

    public function store_product(Request $request)
    {
        $product_name = $request->input('product_name');
        $product_category = $request->input('product_category');
        $product_price = $request->input('product_price');
        $In_stock = $request->input('In_stock');
        DB::table('products')->insert([
            'product_name' => $product_name,
            'product_category' => $product_category,
            'product_price' => $product_price,
            'In_stock' => $In_stock,
        ]);
        return view('create_product', []);
    }
    public function edit_product(string $id)
    {
        $entry = DB::table('products')->where('id', $id)->first();
        return view('edit_product', [
            'product' => $entry
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_product(Request $request, string $id)
    {
        $entry = $request;
        DB::table('products')->where('id', $id)->update([
            'product_name' => $request['product_name'],
            'product_category' => $request['product_category'],
            'product_price' => $request['product_price'],
            'In_stock' => $request['In_stock'],
        ]);


        return redirect()->route('user.table')
            ->with('success', 'Product updated successfully.');
    }
    public function product_destroy(string $id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('user.table')
            ->with('success', 'Product deleted successfully.');
    }
}
