@extends('frontend.layouts')

@section('content')
    <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Order Success</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Order Success</li>
            </ol>
        </div>

<div class="container py-5 text-center">

    <div class="bg-light p-5 rounded shadow">

        <h1 class="text-success mb-3"> Order Placed Successfully!</h1>

        <p class="mb-2">Thank you for your order.</p>
        <p>Order ID: <strong>#{{ $order->id }}</strong></p>

        <hr>

        <h4 class="mb-3">Order Summary</h4>

        <div class="text-start">
          <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
            <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
        </div>

        <hr>

        {{-- <h5>Total Paid: {{ format_price($order->total, 2) }}</h5> --}}
          <div class="text-end mt-3">
    <h4>Total:  {{ format_price($order->total_amount) }}</h4>
</div>

        <a href="{{ route('web.shopping') }}" class="btn btn-primary mt-3">
            Continue Shopping
        </a>

        <a href="{{ route('order.details', $order->id) }}" class="btn btn-outline-secondary mt-3">
            View Order Details
        </a>

    </div>

</div>

@endsection
