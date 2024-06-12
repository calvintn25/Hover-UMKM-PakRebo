<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
			// SELECT * FROM
      $aboutUs = AboutUs::all();
			return view('admin.about-us.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
			return view('admin.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {
			try {
				DB::beginTransaction();
				// INSERT INTO about-us VALUE()
				$aboutUs = AboutUs::create($request->all());
				if ($request->file('image')->isValid()) {
					$originalName = $request->file('image')->getClientOriginalName();
					$path = $request->file('image')->storeAs('images', $originalName, 'public');

					$aboutUs->image = $originalName;
					$aboutUs->save();
				}
				
				DB::commit();
				return redirect()->route('admin.about-us.index');
			} catch (\Exception $e) {
				DB::rollBack();
				return redirect()->back()->withErrors($e->getMessage())->withInput();
			}
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
			return view('admin.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
			try {
				DB::beginTransaction();
        // UPDATE about-us SET() WHERE id=
				$aboutUs->update($request->all());
				DB::commit();
				return redirect()->route('admin.about-us.index');
			} catch (\Exception $e) {
				DB::rollBack();
				return redirect()->back()->withErrors($e->getMessage())->withInput();
			}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
			try {
				DB::beginTransaction(); // agar ketika error tidak mengaruhi db
				// DELETE FROM about-us WHERE ID=
				$aboutUs->delete();
				DB::commit();
				return redirect()->route('admin.about-us.index');
			} catch (\Exception $e) {
				DB::rollBack();
				return redirect()->route('admin.about-us.index')->withErrors($e->getMessage())->withInput();
			}
    }
}
