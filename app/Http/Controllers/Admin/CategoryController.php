<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'تم إضافة التصنيف بنجاح');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'تم تحديث التصنيف بنجاح');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'تم حذف التصنيف بنجاح');
    }
    public function products(Category $category)
    {
        $products = $category->products()->paginate(10);
        return view('admin.categories.products', compact('category', 'products'));
    }

   public function publicIndex()
{
    $categories = \App\Models\Category::all();
    return view('shop.categories.index', compact('categories'));
}

public function showProducts(\App\Models\Category $category)
{
    $products = $category->products;
    return view('shop.categories.products', compact('category', 'products'));
}


}
