<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with('category','images')->paginate(10);
        // $data = ImageProduct::with('product')->paginate(10);
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
        $dataImage = ImageProduct::where('product_id', $id)->get();
        $dataCategory = Category::whereNotNull('parent_id')->get();

        return view("pages.admin.product.edit.index", compact('data', 'dataImage','dataCategory'));
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

    public function saveToPublish(Request $request, $productId) {
        // return $request;
        $product = Product::find($productId); 
        $product->update([
            'name_product' => $request->name,
            'category_id' => $request->category,
            'price' => (float) str_replace(['$', ','], '', $request->price),
            'price_discount' => (float) str_replace(['$', ','], '', $request->price_discount),
            'status_discount' => ($request->price_discount_toggle == 0) ? 'off' : 'on',
            'condition' => $request->condition,
            'description' => $request->body,
            'status' => 'ready',
        ]);


        return redirect(route('admin.product.edit', $productId));
    }
}
