<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\order;
use Illuminate\Http\Request;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashbaord()
    {
        $users = user::count();
        $orders = order::count();
        $products = product::count();
        $seles = order::sum('total_price');
        $sales_chart = DB::table('orders')
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('SUM(total_price) as total_sales')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();
        $sele_product = DB::table('order_items')->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->limit(10)->get();
        $order_list = order::with('user')->limit(10)->get();
        return view(
            'admin.Dashboard',
            compact('users', 'orders', 'products', 'seles', 'sele_product', 'order_list', 'sales_chart')
        );
    }
public function customer_page_index(Request $request)
{
    $customers = User::where('role', 'customer')
        ->withCount('order')
        ->withSum('order', 'total_price')
        ->when($request->search, function ($query) use ($request) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');

            });

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('admin.customers.index', compact('customers'));
}

    public function customer_desplay()
    {
        $customers = User::withcount('order')->withSum(['order as total_order_price'], 'total_price')->where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function show_customer($id)
    {
        $customer = User::where('role', 'customer')
        ->with(['order' => function ($query) {
            $query->latest();
        }])
        ->findOrFail($id);

    $totalSpent = $customer->order->sum('total_price');

    $averageOrder = $customer->order->count()
        ? $totalSpent / $customer->order->count()
        : 0;

    $lastOrder = $customer->order->first();

    return view('admin.customers.show', compact(
        'customer',
        'totalSpent',
        'averageOrder',
        'lastOrder'
    ));
    }
}
