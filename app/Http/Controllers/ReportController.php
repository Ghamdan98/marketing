<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = clone $query;

        $totalRevenue = (clone $query)
            ->where('status', 'complated')
            ->sum('total_price');

        $totalOrders = (clone $query)->count();

        $totalCustomers = (clone $query)
            ->distinct('user_id')
            ->count('user_id');

        $productsSold = (clone $query)
            ->with('order_item')
            ->get()
            ->sum(function ($order) {
                return $order->order_item->sum('quantity');
            });

        // ==========================================
        // SALES CHART
        // ==========================================

        $chartOrders = clone $query;

        $sales = $chartOrders
            ->selectRaw('DATE(created_at) as date')
            ->selectRaw('SUM(total_price) as revenue')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $chartLabels = $sales->pluck('date');

        $chartData = $sales->pluck('revenue');

        // ==========================================
        // TOP PRODUCTS
        // ==========================================

        $topProducts = (clone $query)
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select(
                'products.id',
                'products.name'
            )
            ->selectRaw('SUM(order_items.quantity) as total_sales')
            ->selectRaw('SUM(order_items.quantity * order_items.price) as total_revenue')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sales')
            ->take(5)
            ->get();


        // ==========================================
        // TOP CUSTOMERS
        // ==========================================

        $topCustomers = (clone $query)
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.name',
                'users.email'
            )
            ->selectRaw('COUNT(orders.id) as total_orders')
            ->selectRaw('SUM(orders.total_price) as total_spent')
            ->groupBy(
                'users.id',
                'users.name',
                'users.email'
            )
            ->orderByDesc('total_spent')
            ->take(5)
            ->get();


        return view('admin.reports.index', compact(

            'totalRevenue',

            'totalOrders',

            'totalCustomers',

            'productsSold',

            'chartLabels',

            'chartData',

            'topProducts',

            'topCustomers'

        ));
    }
    public function exportExcel(Request $request)
    {
        $query = Order::with('user');

        if ($request->filled('from')) {

            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {

            $query->whereDate('created_at', '<=', $request->to);
        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);
        }

        $orders = $query
            ->latest()
            ->get();

        return Excel::download(

            new ReportsExport($orders),

            'sales-report.xlsx'

        );
    }
}
