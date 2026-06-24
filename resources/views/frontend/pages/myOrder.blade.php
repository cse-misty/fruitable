@extends('frontend.layouts')

@section('content')
  <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Order </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">My Order </li>
        </ol>
    </div>

<div class="container" style="padding-top: 50px;">
    <div class="row">

        <div class="col-md-12">

            <div class="card shadow-sm border-0 p-4">

                <h4 class="mb-4">My Orders</h4>

                @if($orders->count() > 0)

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>#Order ID</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>

                            <td>{{ format_price($order->total_amount, 2) }}</td>

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
                                <a href="" class="btn btn-sm btn-primary">
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
       @if ($orders->hasPages())
    <div class="d-flex justify-content-end mt-5">
        <nav>
      
            {{ $orders->links() }}
        </nav>
    </div>
@endif


    </div>
</div>

@endsection
