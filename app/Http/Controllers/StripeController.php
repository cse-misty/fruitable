<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stripe;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $stripe = Stripe::first();
          $products = Product::get();
        return view('backend.admin.paymentMethod.index', compact('stripe','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stripe $stripe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
         $stripe = Stripe::findOrFail($id);
          $products = Product::get();
        return view('backend.stripe.edit', compact('stripe','products'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
 
    $request->validate([
        'name' => 'required',
        'secret_key' => 'required',
        'published_key' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    $stripe = Stripe::findOrFail($id);

    $data = [
        'product_id' => $request->product_id,
        'name' => $request->name,
        'title' => $request->title,
        'mode' => $request->mode,
        'secret_key' => $request->secret_key,
        'published_key' => $request->published_key,
        'payment_gateway_title' => $request->payment_gateway_title,
    ];


    if ($request->hasFile('image')) {

        if ($stripe->image && Storage::disk('public')->exists($stripe->image)) {
            Storage::disk('public')->delete($stripe->image);
        }


        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('stripe', $imageName, 'public');

        $data['image'] = $imagePath;
    }

    $stripe->update($data);

    Alert::success('Success', 'Website settings updated successfully!');

    return redirect()->route('payment.method')
        ->with('success', 'Stripe settings updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stripe $stripe)
    {
        //
    }
}
