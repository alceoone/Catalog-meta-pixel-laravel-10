<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::paginate(10);
        return view("pages.admin.product.index", compact('data'));
    }
    public function store()
    {
        $data = Product::create([
            'status' => 'draf'
        ]);

        return redirect(route('admin.product.edit', $data->id));
    }
    public function edit($id)
    {
        $data = Product::find($id);
        return view("pages.admin.product.edit.index", compact('data'));
    }
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');

    }
}
