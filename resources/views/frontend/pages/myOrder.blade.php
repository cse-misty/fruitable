@extends('frontend.layouts')

@section('content')

<div class="container" style="padding-top: 200px;">
    <div class="row">

        <div class="col-md-12">

            <div class="card shadow-sm border-0 p-4">

                <h4 class="mb-4">My Orders</h4>

                @if($orders->count() > 0)

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>

                            <td>৳ {{ $order->total_price }}</td>

                            <td>
                                <span class="badge
                                    @if($order->status == 'pending') bg-warning
                                    @elseif($order->status == 'completed') bg-success
                                    @else bg-danger
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td>{{ $order->created_at->format('d M Y') }}</td>

                            <td>
                                <a href="#" class="btn btn-sm btn-primary">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                @else
                    <p class="text-muted">No orders found.</p>
                @endif

            </div>

        </div>

    </div>
</div>

@endsection
