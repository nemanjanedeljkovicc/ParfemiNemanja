<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = CartItem::with('perfume')->where('user_id', auth()->id())->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $grandTotal = $items->sum(function ($item) {
            $price = $item->perfume?->discount_price ?? $item->perfume?->price ?? 0;
            return $price * $item->quantity;
        });

        return view('pages.checkout.index', compact('items', 'grandTotal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $items = CartItem::with('perfume')->where('user_id', auth()->id())->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        DB::transaction(function () use ($validated, $items) {
            $grandTotal = $items->sum(function ($item) {
                $price = $item->perfume?->discount_price ?? $item->perfume?->price ?? 0;
                return $price * $item->quantity;
            });

            $order = Order::create([
                'user_id' => auth()->id(),
                'name' => $validated['name'],
                'surname' => $validated['surname'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'],
                'note' => $validated['note'] ?? null,
                'total_price' => $grandTotal,
                'status' => 'pending',
            ]);

            foreach ($items as $item) {
                $price = $item->perfume?->discount_price ?? $item->perfume?->price ?? 0;

                $order->items()->create([
                    'perfume_id' => $item->perfume_id,
                    'price' => $price,
                    'quantity' => $item->quantity,
                ]);
            }

            CartItem::where('user_id', auth()->id())->delete();

            logActivity('Created order: ' . auth()->user()->email);
        });

        return redirect()->route('cart.index')
            ->with('success', 'Your order has been placed successfully.');
    }
}
