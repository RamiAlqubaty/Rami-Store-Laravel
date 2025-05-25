<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // عرض قائمة المنتجات (اختياري)
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد مع إرسال التصنيفات
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // حفظ منتج جديد مع التحقق من الحقول ودعم رفع الصورة وربط التصنيف
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    // عرض نموذج تعديل المنتج مع إرسال بيانات المنتج والتصنيفات
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // تحديث منتج موجود مع التحقق من الحقول ودعم رفع الصورة وربط التصنيف
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة (اختياري)
            if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
                unlink(public_path('uploads/' . $product->image));
            }
            $imageName = Str::random(10) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    // حذف المنتج (اختياري)
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
            unlink(public_path('uploads/' . $product->image));
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج بنجاح');
    }
}
