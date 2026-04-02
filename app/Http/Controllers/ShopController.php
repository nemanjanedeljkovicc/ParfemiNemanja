<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Perfume;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();

        $query=Perfume::query()->with(['categories','brand']);

        if ($request->has('category') && is_array($request->category)) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('categories.id', $request->category);
            });
        }

        if ($request->has('brand') && is_array($request->brand)) {
            $query->whereIn('brand_id', $request->brand);
        }

        if ($request->has('ml') && is_array($request->ml)) {
            $query->whereIn('ml', $request->ml);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort == 'name_desc') {
                $query->orderBy('name', 'desc');
            } elseif ($request->sort == 'price_asc') {
                $query->orderByRaw('IF(discount_price IS NOT NULL, discount_price, price) ASC');
            } elseif ($request->sort == 'price_desc') {
                $query->orderByRaw('IF(discount_price IS NOT NULL, discount_price, price) DESC');
            }
        } else {
            $query->orderBy('name', 'asc');
        }

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $perfumes = $query->paginate(9)->withQueryString();

        if ($request->ajax()) {
            return view('pages.shop.partials.products', compact('perfumes'))->render();
        }

        return view('pages.shop.index',compact('perfumes','categories','brands'));
    }

    public function details(Perfume $perfume)
    {
        $perfume->load(['brand', 'categories']);

        return view('pages.shop.partials.details', compact('perfume'));
    }

}
