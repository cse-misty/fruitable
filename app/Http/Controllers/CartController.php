<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CartController extends Controller
{

    public function showShop(Request $request)
    {
        $categories = Category::with('products')->get();
        $products = Product::query();

        if ($request->has('category_id')) {
            $products->where('category_id', $request->category_id);
        }
        $products = $products->get();

        return view('frontend.pages.shopping', compact('categories', 'products'));
    }


    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('frontend.pages.cart', compact('cart'));
    }


    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Insufficient stock!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($product->stock < ($cart[$id]['quantity'] + $quantity)) {
                return redirect()->back()->with('error', 'Not enough stock available!');
            }
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }


    public function updateCart(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $product = Product::findOrFail($id);

        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Insufficient stock!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed successfully!');
    }


    public function showCheckout()
    {
        $cart = session()->get('cart', []);


        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        $shippingCharge = 60.00;
        $totalAmount = $subTotal + $shippingCharge;

        return view('frontend.pages.checkout', compact('cart', 'subTotal', 'shippingCharge', 'totalAmount'));

    }

    public function placeOrder(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route('login');
        }


        $request->validate([
            'shipping_address' => 'required|string',
            'payment_method'   => 'required|in:COD,Stripe,bKash,Nagad'
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Cart is empty');
        }

        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }

        $totalAmount = $subTotal + 60;

        \DB::beginTransaction();
        try {

            $order = Order::create([
                'user_id'          => auth()->id(),
                'shipping_address' => $request->shipping_address,
                'payment_method'   => $request->payment_method,
                'total_amount'     => $totalAmount,
                'status'           => 'pending'
            ]);


            foreach ($cart as $key => $item) {
                $productId = $item['product_id'] ?? $item['id'] ?? $key;

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $productId,
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price']
                ]);

                if (\Schema::hasColumn('products', 'stock')) {
                    Product::where('id', $productId)->decrement('stock', $item['quantity']);
                }
            }

            \DB::commit();


            if ($request->payment_method === 'Stripe') {


                Stripe::setApiKey(env('STRIPE_SECRET'));


                $checkoutSession = StripeSession::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'bdt',
                            'product_data' => [
                                'name' => 'Order #' . $order->id,
                            ],
                            'unit_amount' => $totalAmount * 100,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',

                    'success_url' => route('payment.success') . '?order_id=' . $order->id,
                    'cancel_url' => route('payment.cancel') . '?order_id=' . $order->id,
                ]);


                return redirect()->away($checkoutSession->url);
            }

            if ($request->payment_method === 'bKash') {
        return redirect()->route('bkash.payment', ['order_id' => $order->id]);
            }

            if ($request->payment_method === 'Nagad') {
                return redirect()->route('nagad.payment', ['order_id' => $order->id]);
            }


            session()->forget('cart');
            return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }



public function paymentSuccess(Request $request)
{
    $orderId = $request->get('order_id');
    $order = Order::findOrFail($orderId);


    $order->update(['status' => 'paid']);


    session()->forget('cart');


    return redirect()->route('order.success', $order->id)->with('success', 'Payment Successful!');
}
    public function success($orderId)
    {

        $order = Order::with(['items.product', 'user'])->findOrFail($orderId);

        return view('frontend.pages.orderSuccess', compact('order'));
    }

    public function details($orderId)
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($orderId);

        return view('frontend.pages.orderDetails', compact('order'));
    }


public function paymentCancel(Request $request)
{
    $orderId = $request->get('order_id');
    $order = Order::findOrFail($orderId);


    $order->update(['status' => 'payment_failed']);

    return redirect()->route('checkout.index')->with('error', 'Payment was cancelled or failed. Please try again.');
}

public function orderHistory()
{
    $orders = Order::with(['items.product', 'user'])
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('frontend.pages.myOrder', compact('orders'));
}
}
