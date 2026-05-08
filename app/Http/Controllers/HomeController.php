<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with('media')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        $signatureProduct = \App\Models\Product::with('media')
            ->where('is_signature', true)
            ->first();
            
        $settings = \App\Models\SiteSetting::pluck('value', 'key')->toArray();
        
        return view('welcome', compact('categories', 'signatureProduct', 'settings'));
    }
}
