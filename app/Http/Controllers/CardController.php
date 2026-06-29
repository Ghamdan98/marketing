<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\card;
use App\Models\card_item;
use App\Models\product;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $is_card = false;
        $card = card::with('card_item.product')->where('user_id', Auth::user()->id)->first();
        $total = 0;
        if ($card) {
            // $is_card = true;
            $total = $card->card_item->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
        }
        return view('/card', compact('card', 'total',));
    }

    public function add_item(product $prod)
    {
        $card = card::firstOrcreate([
            'user_id' => Auth::user()->id
        ]);
        $item = card_Item::where('id', $card->id)
            ->where('product_id', $prod->id)
            ->first();
        if ($item) {
            $item->increment('quantity');
        } else (
            card_item::create([
                'card_id' => $card->id,
                'product_id' => $prod->id,
                'quantity' => 1,
                'price' => $prod->price
            ])
        );
        return redirect()->route('card.index')->with('success', 'add iten is successfully');
    }

    public function increment(card_item $item)
    {
        $item->increment('quantity');
        return back();
    }

    public function decrease(card_item $item)
    {
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete();
        }
        return back();
    }

    public function delete(card_item $item)
    {
        $item->delete();
        return back();
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
    public function store(Request $request)
    {
        //
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
