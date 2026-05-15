<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function create(Product $product)
    {
        return view('variants.form', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required'
        ]);

        $validated['product_id'] = $product->id;

        Variant::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Variant berhasil ditambahkan');
    }
}