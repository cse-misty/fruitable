<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
  use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::with('user')->latest()->paginate(10);

        return view('backend.admin.order.index', compact('orders'));
    }


    public function show($id)
    {

        $order = Order::with(['user', 'items.product'])->findOrFail($id);

        return view('backend.admin.order.show', compact('order'));
    }


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'order_status' => 'required|string|in:pending,processing,completed,cancelled',
    ]);

    $order = Order::findOrFail($id);
    $order->status = $request->order_status;
    $order->save();


    Alert::success('Success', 'Order status updated to ' . ucfirst($request->order_status) . ' successfully!');


    return redirect()->back()->with('success', 'Order status updated to ' . ucfirst($request->order_status) . ' successfully!');
}




public function destroy($id)
{

    DB::table('order_items')->where('order_id', $id)->delete();


    $order = Order::findOrFail($id);
    $order->delete();

    Alert::success('Success', 'Order and its items deleted successfully');
    return redirect()->back();
}

public function printInvoice($id)
{

    $order = Order::with(['user', 'items.product'])->findOrFail($id);

    return view('backend.admin.order.print', compact('order'));
}


}
