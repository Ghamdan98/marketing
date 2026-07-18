<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\category;
use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
// dd('DashboardController');
    $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalCustomers = User::where('role', 'customer')->count();

        $totalOrders = Order::count();

        $totalRevenue = Order::where('status', 'completed')
            ->sum('total_price');

        $pendingOrders = Order::where('status', 'pending')->count();

        $completedOrders = Order::where('status', 'completed')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $latestCustomers = User::where('role', 'customer')
            ->latest()
            ->take(5)
            ->get();

        // $topProducts = Product::withCount('order_Items')
        //     ->orderByDesc('order_items_count')
        //     ->take(5)
        //     ->get();

        return view('admin.dashboard', compact(

            'totalProducts',

            'totalCategories',

            'totalCustomers',

            'totalOrders',

            'totalRevenue',

            'pendingOrders',

            'completedOrders',

            'cancelledOrders',

            'recentOrders',

            'latestCustomers',

            // 'topProducts'

        ));
    }
}
