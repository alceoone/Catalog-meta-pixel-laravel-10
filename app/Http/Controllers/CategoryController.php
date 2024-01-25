<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->paginate(10);

        return view('pages.admin.category.index', compact('categories'));
    }

    public function create() {
        return view('pages.admin.category.create.index');
    }
    public function store(Request $request){

        if($request->inisial == 'category'){
            Category::create([
                'name' => $request->title
            ]);
            return redirect()->route('admin.category.index')->with('success','Create Category Successfully.');
        } else if($request->inisial == 'subcategory') {
            Category::create([
                'name' => $request->title,
                'parent_id' => $request->category_id
            ]);
            return redirect()->route('admin.category.index')->with('success','Create Sub Category Successfully.');
        }

    }
}
