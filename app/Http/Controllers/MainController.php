<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Header;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();
        $headers = Header::all();
        return view('main', compact('products', 'productCategories', 'headers'));
    }

}
