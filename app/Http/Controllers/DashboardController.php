<?php


namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Informasi terbaru
        $informasi = Informasi::latest()->take(1)->get();

        // Produk unggulan: harga paling murah, 4 data
        $unggulanProducts = Product::latest()->take(4)->get();

        $hotDeals = Product::orderBy('harga', 'asc')->take(1)->get();
$bestSeller = Product::orderBy('harga', 'desc')->take(1)->get();
$featuredProducts = Product::where('harga', true)->get();
        return view('dashboard', compact('hotDeals', 'bestSeller', 'featuredProducts', 'informasi', 'unggulanProducts'));
    }
}
