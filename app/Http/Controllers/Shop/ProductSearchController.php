<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(12);

        return view('shop.search_results', compact('products', 'query'));
    }
}
