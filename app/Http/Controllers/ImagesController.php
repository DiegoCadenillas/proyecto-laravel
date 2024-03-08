<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Images::all();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'altText' => 'required|string|max:255'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('productImages'), $filename);

            $newImage = Images::create([
                'productId' => $request->productId,
                'imgURL' => $filename, // Storing filename as imgURL
                'altText' => $request->altText,
            ]);

            return redirect()->route('images.index')->with('success', 'Se ha creado una nueva Imagen.');
        }

        return back()->withInput()->with('error', 'Failed to upload image');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $image = Images::find($id);

        return view('images.show', [
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $image = Images::find($id);

        return view('images.edit', [
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'altText' => 'required|max:70'
        ]);

        $image = Images::find($id);

        $image->update($request->all());

        return redirect()->route('images.index')
            ->with('success', 'Modificación realizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $image = Images::find($id);

        if ($image) {
            $imgPath = public_path('productImages/' . $image->imgURL);
            if (File::exists($imgPath)) File::delete($imgPath);
            $image->delete();
            return redirect()->route('images.index')->with('success', 'Imagen borrada');
        }
    }
}
