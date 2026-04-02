<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $items = CartItem::with('perfume')->where('user_id', $userId)->get();
        return view('pages.cart.index', compact('items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:perfumes,id'
        ]);

        $user = auth()->user();
        $productId = $request->product_id;

        $item = CartItem::where('user_id', $user->id)
            ->where('perfume_id', $productId)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'perfume_id' => $productId,
                'quantity' => 1
            ]);
        }

        logActivity('Added to cart: ' . $user->email);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart_count' => CartItem::where('user_id', $user->id)->sum('quantity'),
        ]);
    }

    public function update(Request $request)
    {
        $item = CartItem::find($request->id);
        if($item && $item->user_id == auth()->id()){
            $item->quantity = $request->quantity;
            $item->save();
            $price = $item->perfume->discount_price ?? $item->perfume->price;
            $total = $item->quantity * $price;
            return response()->json([
                'success' => true,
                'total' => $total,
                'cart_count' => CartItem::where('user_id', auth()->id())->sum('quantity'),
            ]);
        }
        return response()->json(['success' => false], 400);
    }

    public function remove(Request $request)
    {
        $item = CartItem::find($request->id);
        if($item && $item->user_id == auth()->id()){
            $item->delete();
            return response()->json([
                'success' => true,
                'cart_count' => CartItem::where('user_id', auth()->id())->sum('quantity'),
            ]);
        }
        return response()->json(['success' => false], 400);
    }
}
