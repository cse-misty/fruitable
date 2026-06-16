@extends('backend.dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-8">
                <!-- 1. Order Summary Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Order Details (#{{ $order->id }})</h5>

                    </div>
                    <div class="card-body">


                        <div class="row mb-3">
                            <div class="col-md-12 mb-2">
                                <h6 class="fw-bold text-primary border-bottom pb-2">Payment Info</h6>
                                <div class="d-flex justify-content-between py-1">
                                    <span class="text-dark fw-semibold">Method:</span>
                                    <span class="badge bg-info text-dark font-weight-bold">{{ strtoupper($order->payment_method ?? 'N/A') }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span class="text-dark fw-semibold">Payment Status:</span>
                                    <span class="badge {{ ($order->payment_status ?? 'pending') == 'paid' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($order->payment_status ?? 'Pending') }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h6 class="fw-bold text-primary border-bottom pb-2">Order Management</h6>
                                <div class="d-flex justify-content-between align-items-center py-1">
                                    <span class="text-dark fw-semibold">Order Status:</span>
                                    @if(($order->status ?? 'pending') == 'pending')
                                        <span class="badge bg-warning text-dark fs-6 px-3">Pending</span>
                                    @elseif($order->status == 'processing')
                                        <span class="badge bg-primary fs-6 px-3">Processing</span>
                                    @elseif($order->status == 'completed')
                                        <span class="badge bg-success fs-6 px-3">Completed</span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- 2. Product Items Table -->
                        <h6 class="mb-3 fw-bold text-primary border-bottom pb-2">Order Items</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                @if($item->product && !empty($item->product->image))
                                                    <img src="{{ asset('Storage/' . $item->product->image) }}" alt="Product" style="width: 55px; height: 55px; object-fit: cover; border: 1px solid #ddd; padding: 2px; border-radius: 5px;">
                                                @else
                                                    <img src="{{ asset('frontend/assets/img/default-product.jpg') }}" alt="Default" style="width: 55px; height: 55px; object-fit: cover; border: 1px solid #ddd; padding: 2px; border-radius: 5px;">
                                                @endif
                                            </td>

                                            <td class="text-start fw-semibold">{{ $item->product->name ?? 'Product Deleted' }}</td>
                                            <td>$ {{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }} Pieces</td>
                                            <td>$ {{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach

                                    <tr class="fw-bold bg-light">
                                        <td colspan="4" class="text-end">Subtotal:</td>
                                        <td>$ {{ number_format($order->subtotal ?? $order->total_amount, 2) }}</td>
                                    </tr>
                                    @if(isset($order->delivery_charge) || isset($order->shipping_charge))
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Delivery Charge:</td>
                                        <td class="fw-bold">$ {{ number_format($order->delivery_charge ?? $order->shipping_charge ?? 0, 2) }}</td>
                                    </tr>
                                    @endif
                                    @if(isset($order->discount) && $order->discount > 0)
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold text-danger">Discount:</td>
                                        <td class="fw-bold text-danger">-$ {{ number_format($order->discount, 2) }}</td>
                                    </tr>
                                    @endif
                                    <tr class="table-primary fw-bold">
                                        <td colspan="4" class="text-end fs-5">Grand Total:</td>
                                        <td class="fs-5">$ {{ number_format($order->total_amount, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="row bg-light p-3 rounded mx-0 border">
                            <div class="col-md-6 mb-2 mb-md-0 border-end">
                                <span class="text-dark d-block fw-semibold mb-1" style="font-size: 13px;">Picked Date</span>
                                <span class="text-dark fw-bold" style="font-size: 15px;">
                                    <i class="far fa-calendar-check text-success me-1"></i>
                                    {{ $order->picked_at ? $order->picked_at->format('F d, Y') : 'May 19, 2026' }} <span class="text-muted small">N/A</span>
                                </span>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <span class="text-dark d-block fw-semibold mb-1" style="font-size: 13px;">Delivery Date</span>
                                <span class="text-dark fw-bold" style="font-size: 15px;">
                                    <i class="far fa-calendar-alt text-dark me-1"></i>
                                    {{ $order->delivered_at ? $order->delivered_at->format('F d, Y') : 'June 16, 2026' }} <span class="text-muted small">N/A</span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        <div class="col-lg-4">
        <!-- 1. Customer & Shipping Details -->

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Customer & Shipping</h5>
                </div>
                <div class="card-body">
                    <h6><strong>Customer Info: Demo User</strong></h6>

                    <p class="mb-1"><strong>Name:</strong> {{ $order->user->name ?? 'Guest Customer' }}</p>
                    <p class="mb-3"><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                    <p class="mb-3"><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>

                    <hr>

                    <h6><strong>Shipping Address:</strong></h6>
                    <div class="bg-light p-3 rounded border">

                        <p class="mb-0 text-dark fw-medium" style="line-height: 1.6;">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            {{ $order->shipping_address ?? 'No shipping address provided.' }}
                        </p>
                    </div>
                </div>
            </div>


            <!-- 2. Change Status Form -->
            <div class="card shadow-sm mb-4">

                <div class="card-header bg-secondery text-dark">
                    <h5 class="mb-0">Change Order Status</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold p-3">Select Status</label>
                            <select name="order_status " class="form-select p-1">
                                <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">
                            <i class="fas fa-sync-alt me-2"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>


            <!-- Back Button -->
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary w-100 fw-bold text-dark">
                <i class="fas fa-arrow-left me-2"></i> Back to Orders
            </a>
        </div>
    </div>
</div>
@endsection
