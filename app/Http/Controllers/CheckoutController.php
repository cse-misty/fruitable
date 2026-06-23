<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function shopping(){
        $categories = Category::select('id','title','image','description','slug','thumbnail','priority','status')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
            ->get();

        $products = Product::select('id','name','category_id','price','priority','status','image','description')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
            ->get();



        return view('frontend.pages.shopping', compact('categories', 'products'));
    }

    public function shopDetails($id){
        $product = Product::with('category')->where('status', 1)->findOrFail($id);

        $categories = Category::select('id','title','image','description','slug','thumbnail','priority','status')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
            ->get();

        $products = Product::select('id','name','category_id','price','priority','status','image','description')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
            ->get();


        $reviews = Review::with(['user', 'product']) 
            ->where('status', 1)
            ->latest()
            ->limit(4)
            ->get();

        return view('frontend.pages.shopDetails', compact('categories', 'products', 'product'));
    }

    public function cart(){
        return view('frontend.pages.cart');
    }

    public function checkout(){
        $cart = session('cart', []);
        $subTotal = 0;

        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        return view('frontend.pages.checkout', compact('cart', 'subTotal'));
    }

    // public function placeOrder(Request $request)
    // {
    //     if (!auth()->check()) {
    //         return redirect()->route('login');
    //     }


    //     $request->validate([
    //         'shipping_address' => 'required|string',
    //         'payment_method'   => 'required'
    //     ]);

    //     $cart = session('cart', []);
    //     if (empty($cart)) {
    //         return back()->with('error', 'Cart is empty');
    //     }

    //     $subTotal = 0;
    //     foreach ($cart as $item) {
    //         $subTotal += $item['price'] * $item['quantity'];
    //     }
    //     $totalAmount = $subTotal + 60;

    //     DB::beginTransaction();
    //     try {

    //         $order = Order::create([
    //             'user_id'          => auth()->id(),
    //             'shipping_address' => $request->shipping_address,
    //             'payment_method'   => $request->payment_method,
    //             'total_amount'     => $totalAmount,
    //             'status'           => 'pending'
    //         ]);


    //         foreach ($cart as $key => $item) {

    //             $productId = $item['product_id'] ?? $item['id'] ?? $key;

    //             OrderItem::create([
    //                 'order_id'   => $order->id,
    //                 'product_id' => $productId,
    //                 'quantity'   => $item['quantity'],
    //                 'price'      => $item['price']
    //             ]);


    //             if (\Schema::hasColumn('products', 'stock')) {
    //                 Product::where('id', $productId)->decrement('stock', $item['quantity']);
    //             }
    //         }

    //         DB::commit();


    //         session()->forget('cart');


    //         return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully');

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'Something went wrong! ' . $e->getMessage());
    //     }
    // }

    // public function success($orderId)
    // {

    //     $order = Order::with(['items.product', 'user'])->findOrFail($orderId);

    //     return view('frontend.pages.orderSuccess', compact('order'));
    // }

    // public function details($orderId)
    // {
    //     $order = Order::with(['items.product', 'user'])->findOrFail($orderId);

    //     return view('frontend.pages.orderDetails', compact('order'));
    // }
}
