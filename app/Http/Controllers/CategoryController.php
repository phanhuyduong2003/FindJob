<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('admin.category.manage')->with('success', 'Category created successfully');
    }
    public function manage()
    {
        $categories = Category::oldest()->paginate(3);
        return view('admin.category.manage', ['categories' => $categories]);
    }
}