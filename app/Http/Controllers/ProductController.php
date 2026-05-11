<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products, optionally filtered by category.
     */
    public function index(?Category $category = null): View
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $query = Product::with(['media', 'category'])
            ->orderBy('sort_order');

        if ($category && $category->exists) {
            $query->where('category_id', $category->id);
            $activeCategory = $category;
        } else {
            $activeCategory = null;
        }

        $products = $query->get();

        return view('products.index', [
            'categories' => $categories,
            'products' => $products,
            'activeCategory' => $activeCategory,
        ]);
    }
}
