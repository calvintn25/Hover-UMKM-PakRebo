<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeaderRequest;
use App\Http\Requests\UpdateHeaderRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = Header::all();
        return view('admin.headers.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.headers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeaderRequest $request)
    {
        try {
            DB::beginTransaction();
            $request['slug'] = Str::slug($request['name']);

            // INSERT INTO products VALUE()
            $header = Header::create($request->all());
            if ($request->file('image')->isValid()) {
                $originalName = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('images', $originalName, 'public');

                $header->image = $originalName;
                $header->save();
            }

            DB::commit();
            return redirect()->route('admin.headers.index')->withSuccess('Create Product Success');
    } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('admin.headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeaderRequest $request, Header $header)
    {
        try {
            DB::beginTransaction();
            $request['slug'] = Str::slug($request['name']);
        // UPDATE products SET() WHERE id=
            $header->update($request->all());
            DB::commit();
            return redirect()->route('admin.headers.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        try {
			DB::beginTransaction(); // agar ketika error tidak mengaruhi db
        // DELETE FROM products WHERE ID=
			$header->delete();
			DB::commit();
			return redirect()->route('admin.headers.index')->withSuccess('delete Product Success');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->route('admin.headers.index')->withErrors($e->getMessage())->withInput();
		}
    }
}
