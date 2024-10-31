<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WalletController;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Seller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{id}', 'product')->name('product');
});

// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('profiles', ProfileController::class);
    Route::get('wallets/deposite', [WalletController::class, 'deposite'])->name('wallets.deposite');
    Route::post('wallets/deposite', [WalletController::class, 'storeDeposite'])->name('wallets.storeDeposite');
    Route::resource('wallets', WalletController::class);
    Route::get('/checkout/{id}', [PageController::class, 'checkout'])->name('checkout');
});



Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('settings', SettingController::class);
    Route::get('/', function () {

        if (Auth::user()->role === 'seller') {
            $myProductIds = Product::where('seller_id', Auth::user()->id)->pluck('id');
            $myProducts = $myProductIds->count();
            $mySales = Sale::whereIn('product_id', $myProductIds)->count();
            $myRevenue = Sale::whereIn('product_id', $myProductIds)->sum('total');

            $salesChartLabels = Sale::whereIn('product_id', $myProductIds)->get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->keys();

            $salesChartData = Sale::whereIn('product_id', $myProductIds)->get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->map(function ($item) {
                return $item->sum('total');
            });

            $recentOrders = Sale::whereIn('product_id', $myProductIds)->orderBy('created_at', 'desc')->take(5)->get();

            $topSellingProducts = Product::whereIn('id', $myProductIds)
                ->withCount(['sales' => function ($query) use ($myProductIds) {
                    $query->whereIn('product_id', $myProductIds);
                }])
                ->orderBy('sales_count', 'desc')
                ->take(5)
                ->get();

            return view('dashboard.index', [
                'products' => Product::where('seller_id', Auth::user()->id)->get(),
                'users' => User::all(),
                'myProducts' => $myProducts,
                'mySales' => $mySales,
                'myRevenue' => $myRevenue,
                'salesChartLabels' => $salesChartLabels,
                'salesChartData' => $salesChartData,
                'topSellingProducts' => $topSellingProducts,
                'recentOrders' => $recentOrders
            ]);
        } elseif (Auth::user()->role === 'admin') {
            // Top sellers berdasarkan jumlah penjualan
            $topSellers = Seller::withCount('sales')
                ->orderBy('sales_count', 'desc')
                ->take(5)
                ->get();
            $salesChartLabels = Sale::get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->keys();
            $salesChartData = Sale::get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->map(function ($item) {
                return $item->sum('total');
            });  
            return view('dashboard.index', [
                'products' => Product::all(),
                'users' => User::all(),
                'sales' => Sale::all(),
                'recentOrders' => Sale::orderBy('created_at', 'desc')->take(5)->get(),
                'topSellers' => $topSellers,
                'salesChartLabels' => $salesChartLabels,
                'salesChartData' => $salesChartData
            ]);
        } else {
            return view('welcome', ['products' => Product::all(), 'users' => User::all(), 'categories' => Category::all()]);
        }
    })->name('dashboard');
});

// Rute index dan show tanpa middleware auth dan verified



require __DIR__ . '/auth.php';
