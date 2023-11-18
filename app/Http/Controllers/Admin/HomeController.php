<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $year = now()->year;
        $user = DB::table('users')->where('role', '=', 'user')->count();
        $booking = DB::table('bookings')->count();
        $kritik = DB::table('kritiksaran')->count();
        $order = DB::table('orders')->count();
        $januarySum = DB::table('orders')
            ->whereMonth('created_at', '=', 1)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $februarySum = DB::table('orders')
            ->whereMonth('created_at', '=', 2)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $maretSum = DB::table('orders')
            ->whereMonth('created_at', '=', 3)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $aprilSum = DB::table('orders')
            ->whereMonth('created_at', '=', 4)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $meiSum = DB::table('orders')
            ->whereMonth('created_at', '=', 5)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $juneSum = DB::table('orders')
            ->whereMonth('created_at', '=', 6)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $julySum = DB::table('orders')
            ->whereMonth('created_at', '=', 7)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $augustSum = DB::table('orders')
            ->whereMonth('created_at', '=', 8)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $septemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 9)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $octoberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 10)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $novemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 11)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $decemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 12)
            ->whereYear('created_at', '=', $year)
            ->sum('total');

        $yeartotal = DB::table('orders')
            ->whereYear('created_at', '=', $year)
            ->sum('total');

        return view('pages.admin.dashboard.home', compact('user', 'booking', 'kritik', 'order', 'januarySum', 'februarySum', 'maretSum', 'aprilSum', 'meiSum', 'juneSum', 'julySum', 'augustSum', 'septemberSum', 'octoberSum', 'novemberSum', 'decemberSum', 'year', 'yeartotal'));
    }
    public function favorit()
    {
        $year = now()->year;
        $user = DB::table('users')->where('role', '=', 'user')->count();
        $booking = DB::table('bookings')->count();
        $kritik = DB::table('kritiksaran')->count();
        $order = DB::table('orders')->count();
        $products = Product::withCount('orderDetails')->get();
        $januarySum = DB::table('orders')
            ->whereMonth('created_at', '=', 1)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $februarySum = DB::table('orders')
            ->whereMonth('created_at', '=', 2)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $maretSum = DB::table('orders')
            ->whereMonth('created_at', '=', 3)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $aprilSum = DB::table('orders')
            ->whereMonth('created_at', '=', 4)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $meiSum = DB::table('orders')
            ->whereMonth('created_at', '=', 5)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $juneSum = DB::table('orders')
            ->whereMonth('created_at', '=', 6)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $julySum = DB::table('orders')
            ->whereMonth('created_at', '=', 7)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $augustSum = DB::table('orders')
            ->whereMonth('created_at', '=', 8)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $septemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 9)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $octoberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 10)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $novemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 11)
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $decemberSum = DB::table('orders')
            ->whereMonth('created_at', '=', 12)
            ->whereYear('created_at', '=', $year)
            ->sum('total');

        $yeartotal = DB::table('orders')
            ->whereYear('created_at', '=', $year)
            ->sum('total');
        $mostOrderedProduct = $products->sortByDesc('order_details_count')->first();

        $productTitles = $products->pluck('title');
        $productCheckoutCounts = $products->pluck('order_details_count');
        return view('pages.admin.dashboard.home', compact('user', 'booking', 'kritik', 'order', 'januarySum', 'februarySum', 'maretSum', 'aprilSum', 'meiSum', 'juneSum', 'julySum', 'augustSum', 'septemberSum', 'octoberSum', 'novemberSum', 'decemberSum', 'year', 'yeartotal', 'productTitles', 'productCheckoutCounts', 'mostOrderedProduct'));
    }
}
