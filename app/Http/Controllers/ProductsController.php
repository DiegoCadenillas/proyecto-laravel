<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Images;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Products::create($request->all());
        return redirect()->route('products.index')
            ->withSuccess('Se ha creado un nuevo Producto.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $product = Products::find($id);
        $images = Images::all()->where('productId', '=', $id);

        return view('products.show', [
            'product' => $product,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $product = Products::find($id);

        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required|max:70|min:5',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required|min:0'
        ]);

        $product = Products::find($id);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Modificación realizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $product = Products::find($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Producto borrado');
    }
}
