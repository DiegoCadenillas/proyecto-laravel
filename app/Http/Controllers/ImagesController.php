<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    /**
     * Instantiate a new ImagesController instance, controlling whether user is signed in/verified.
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except([
    //         'logout', 'index'
    //     ]);
    //     $this->middleware('auth')->only('logout', 'index');
    //     $this->middleware('verified')->only('index');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Images::all();
        $products = Products::all();
        $productNames = [];
        foreach ($products as $product) {
            $productNames[$product->id] = $product->name;
        }
        return view('admin.images.index', compact('images', 'productNames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.images.create');
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
                'imgURL' => $filename,
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
        $productName = Products::find($image->productId)->name;

        return view('admin.images.show', [
            'image' => $image,
            'productName' => $productName
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $image = Images::find($id);

        return view('admin.images.edit', [
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

        if ($image && $image->imgURL != 'image.not-found.jpg') {
            $imgPath = public_path('productImages/' . $image->imgURL);
            if (File::exists($imgPath)) File::delete($imgPath);
            $image->delete();
            return redirect()->route('images.index')->with('success', 'Imagen borrada');
        }
    }
}
