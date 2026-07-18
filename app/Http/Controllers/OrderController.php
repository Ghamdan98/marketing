<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\card;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function customer_index()
    {
        //
        $orders = order::where('user_id',Auth::user()->id)->latest()->get();
        return view('/orders/my_orders', compact('orders'));
    }

    public function index(Request $request)
    {
        $orders = Order::with('user')
            ->when($request->search, function ($query) use ($request) {

                $query->where('id', 'like', '%' . $request->search . '%')
                    ->orWhereHas('user', function ($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->search . '%');
                    });
            })
            ->latest()
            ->paginate(10);

        $orders->appends($request->query());

        return view('admin.orders.index', compact('orders'));
    }

    

    public function checkout()
    {
        $card = card::with('card_item.product')->where('user_id', Auth::user()->id)->first();
        $total = $card->card_item->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        return view('/checkout', compact('card', 'total'));
    }

    public function show_details(order $order)
    {
        $order->load('order_item.product');
        return view('orders.order_details', compact('order'));
    }

    public function display_order()
    {
        $orders = order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
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

        $card = card::with('card_item.product')->where('user_id', Auth::user()->id)->first();
        $total = $card->card_item->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $validated = $request->validate([
            'phone' => 'required|string',
            'city'  => 'required|string',
            'address_order' => 'required|string',
        ]);
        $order = order::create([
            'user_id' => Auth::user()->id,
            'phone' => $validated['phone'],
            'city' => $validated['city'],
            'address_order' => $validated['address_order'],
            'total_price' => $total,

        ]);
        foreach ($card->card_item as $c) {
            $total_price = $c->price * $c->quantity;
            order_item::create([
                'order_id' => $order->id,
                'product_id' => $c->product_id,
                'price' => $c->price,
                'quantity' => $c->quantity,
                'total' => $total_price,
            ]);
        }
        $card_id = card::findOrfail($card->id);
        $card_id->delete();
        return redirect()->route('customer_orders');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
{
    $order->load([
        'user',
        'order_item.product'
    ]);

    return view('admin.orders.show', compact('order'));
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

    public function invoice(Order $order)
{
    $order->load([
        'user',
        'order_item.product'
    ]);

    return view('admin.orders.invoice', compact('order'));
}
}
