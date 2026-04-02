<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfumes = Perfume::with('brand','categories')->orderBy('id','ASC')->get();
        return view('admin.products.index',compact('perfumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'ml' => 'required|string|max:10',
            'picture' => 'required|image|max:2048',
            'categories' => 'array',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('perfumes', 'public');
        }
        $product = Perfume::create($data);
        $product->categories()->sync($request->categories ?? []);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
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
    public function edit(Perfume $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit',compact('product','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfume $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'ml' => 'required|string|max:10',
            'picture' => 'nullable|image|max:2048',
            'categories' => 'array',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('perfumes','public');
        }

        $product->update($data);

        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfume $product)
    {
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
