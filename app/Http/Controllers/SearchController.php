<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class SearchController extends Controller
{


public function index(Request $request)
{
    $search = trim($request->input('query'));


    $pageRouteMap = [
        'shop'     => 'web.shopping',
        'contact'  => 'web.contact',
        'about'    => 'web.about',
        'cart'     => 'cart.index',
        'checkout' => 'web.checkout',
        'category' => 'web.category',
        // 'profile'  => 'profile.index',
        // 'orders'   => 'order.history',
        // 'products' => 'products.index',
    ];

    $lowercaseSearch = strtolower($search);

    if (array_key_exists($lowercaseSearch, $pageRouteMap)) {

        return redirect()->route($pageRouteMap[$lowercaseSearch]);
    }


    $results = Product::where('name', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->latest()
        ->paginate(12);

    return view('frontend.pages.searchber', compact('results', 'search'));
}

}
