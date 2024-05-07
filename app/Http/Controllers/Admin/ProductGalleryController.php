<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $gallery = $product->product_galleries;

        return view('pages.admin.product.gallery.index', compact(
            'product',
            'gallery'
        ));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        try {
            $product = Product::findOrFail($id);
            $image = $request->file('image');
            $image->storeAs("public/product")
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
