<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // SELECT * FROM
      $productCategories = ProductCategory::all();
      return view('admin.product-categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $request['slug'] = Str::slug($request['name']);
            // INSERT INTO product_categories VALUE()
            $productCategory = ProductCategory::create($request->all());
            DB::commit();
            return redirect()->route('admin.product-categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
      $products = $productCategory->products;
      return view('admin.product-categories.show', compact('productCategory', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
      return view('admin.product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
			try {
				DB::beginTransaction();
				$request['slug'] = Str::slug($request['name']);
        // UPDATE product_categories SET() WHERE id=
				$productCategory->update($request->all());
				DB::commit();
				return redirect()->route('admin.product-categories.index');
			} catch (\Exception $e) {
				DB::rollBack();
				return redirect()->back()->withErrors($e->getMessage())->withInput();
			}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
			try {
			DB::beginTransaction(); // agar ketika error tidak mengaruhi db
      // DELETE FROM product_categories WHERE ID=
			$productCategory->delete();
			DB::commit();
			return redirect()->route('admin.product-categories.index');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->route('admin.product-categories.index')->withErrors($e->getMessage())->withInput();
		}
    }
}
