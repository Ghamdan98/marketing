<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\order;
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
        $sele_product = DB::table('order_items')->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
        ->groupBy('products.id', 'products.name')
        ->orderByDesc('total_sold')
        ->limit(10)->get();
        $order_list = order::with('user')->limit(10)->get();
        return view('admin.Dashboard', compact('users', 'orders', 'products', 'seles', 'sele_product' , 'order_list'));
    }

    public function customer_desplay(){
        $customers = User::withcount('order')->withSum(['order as total_order_price'], 'total_price')->where('role', 'customer')->get();
        return view('admin.customers.index' , compact('customers'));
    }

}
