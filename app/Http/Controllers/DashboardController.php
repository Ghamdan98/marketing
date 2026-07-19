<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        $totalRevenue = Order::where('status', 'complated')
            ->sum('total_price');

        $pendingOrders = Order::where('status', 'pending')->count();

        $completedOrders = Order::where('status', 'complated')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $latestCustomers = User::where('role', 'customer')
            ->latest()
            ->take(5)
            ->get();
        // ==========================================
        // Monthly Sales Chart
        // ==========================================

        $months = collect([
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ]);

        $sales = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )
            ->where('status', 'pending') /* يجب تغيرالحاله الى */
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        $chartLabels = [];

        $chartData = [];

        foreach ($months as $number => $name) {

            $chartLabels[] = $name;

            $chartData[] = $sales[$number] ?? 0;
        }
        $statusChart = [

            'labels' => [

                'Pending',
                'Completed',
                'Cancelled'

            ],

            'data' => [

                $pendingOrders,
                $completedOrders,
                $cancelledOrders

            ]

        ];
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

            'chartLabels',

            'chartData',
            
            "statusChart",
            // 'topProducts'

        ));
    }
}
