<?php

use App\Http\Controllers\FinancialReportController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//  bai tap buoi 1
//    $results1 = DB::table('users')
//        ->join('orders', 'users.id', '=', 'orders.user_id')
//        ->select('users.name', 'orders.total')
//        ;
//
//    $stats2 = DB::table('orders')
//        ->select(DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(total) as total_revenue'))
//        ->whereBetween('created_at', ['2024-01-01', '2024-01-31'])
//        ;
//
//    $products = DB::table('products')
//        ->whereNotExists(function ($query) {
//            $query->select(DB::raw(1))
//                ->from('order_items')
//                ->whereColumn('order_items.product_id', 'products.id');
//        })
//        ;
//
//    $results5 = DB::table('users')
//        ->join('orders', 'users.id', '=', 'orders.user_id')
//        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//        ->join('products', 'order_items.product_id', '=', 'products.id')
//        ->where('orders.created_at', '>=', now()->subDays(30))
//        ->select('users.name', 'products.name as product_name', 'orders.created_at')
//        ;
//
//
//    $revenue = DB::table('orders')
//        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total) as total_revenue'))
//        ->where('status', 'completed')
//        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
//        ;
//
//    $results = DB::table('users')
//        ->join('orders', 'users.id', '=', 'orders.user_id')
//        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
//        ->join('products', 'order_items.product_id', '=', 'products.id')
//        ->where('orders.created_at', '>=', now()->subDays(30))
//        ->select('users.name', 'products.name as product_name', 'orders.created_at')
//    ;
//
//    $unsoldProducts = DB::table('products')
//        ->whereNotIn('id', function ($query) {
//            $query->select('product_id')->from('order_items');
//        })
//        ;
//
//    $topProducts = DB::table('order_items')
//        ->join('products', 'order_items.product_id', '=', 'products.id')
//        ->select('products.category_id', 'products.id as product_id', DB::raw('SUM(order_items.quantity * order_items.price) as total_revenue'))
//        ->groupBy('products.category_id', 'products.id')
//        ->orderBy('total_revenue', 'desc')
//        ;
//
//    $orders = DB::table('orders')
//        ->where('total', '>', DB::table('orders'))
//        ;
//
//    $topSellingProducts = DB::table('order_items')
//        ->join('products', 'order_items.product_id', '=', 'products.id')
//        ->select('products.category_id', 'products.id as product_id', DB::raw('SUM(order_items.quantity) as total_sales'))
//        ->groupBy('products.category_id', 'products.id')
//        ;
//
//
//
//    dd($results->toRawSql(),
//        $topSellingProducts->toRawSql(),
//        $results1->toRawSql(),
//        $orders->toRawSql(),
//        $topProducts->toRawSql(),
//        $revenue->toRawSql(),
//        $unsoldProducts->toRawSql(),
//        $results5->toRawSql(),
//        $products->toRawSql(),
//        $stats2->toRawSql(),
//    );
// end bai tap buoi 1




    return view('welcome');
});

Route::get('/financial-report/{month}/{year}', [FinancialReportController::class, 'generateMonthlyReport']);
