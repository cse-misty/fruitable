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

<div class="container py-5">

    <h2 class="mb-4">📦 Order Details</h2>

    {{-- ORDER INFO --}}
    <div class="bg-light p-4 rounded mb-4">
        <p><strong>Order ID:</strong> #{{ $order->id }}</p>

        {{-- ইউজার রিলেশন থেকে নাম, ইমেইল ও ফোন আনা হয়েছে --}}
        <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>

        {{-- address পরিবর্তন করে shipping_address করা হয়েছে --}}
        <p><strong>Address:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Status:</strong>
            <span class="badge bg-warning">{{ ucfirst($order->status) ?? 'Pending' }}</span>
        </p>
        <p><strong>Payment:</strong> {{ strtoupper($order->payment_method) }}</p>
    </div>

    {{-- ITEMS TABLE --}}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('frontend/assets/img/vegetable-item-3.png') }}"
                                    class="img-fluid rounded-circle me-3"
                                    style="width: 60px; height: 60px; object-fit: cover;"
                                    alt="{{ $item->product->name ?? 'Product Image' }}">
                                <span>{{ $item->product->name ?? 'Product Removed' }}</span>
                            </div>
                        </td>
                        <td> {{ format_price($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td> {{ format_price($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="text-end mt-3">
    <h4>Total:  {{ format_price($order->total_amount) }}</h4>
</div>




    <a href="{{ route('web.shopping') }}" class="btn btn-primary mt-3">
        Continue Shopping
    </a>

</div>

@endsection
