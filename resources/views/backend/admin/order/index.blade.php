@extends('backend.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manege Order List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-white">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->user->name ?? 'Guest/Unknown' }}</td>
                                <td>${{ number_format($order->total_amount, 2) }}</td>
                                <td><span class="badge bg-info text-dark">{{ strtoupper($order->payment_method) }}</span></td>
                                <td>
                                    @if($order->order_status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($order->order_status == 'processing')
                                        <span class="badge bg-primary">Processing</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->format('d M, Y') }}</td>

                                 <td class="text-center">
                                    <!-- 1. View Order Details Button -->
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-primary btn-sm"
                                    title="View Order Details"
                                    style="background-color: #0D6EFD; border-color: #0D6EFD;">
                                        <i class="fas fa-eye"></i>
                                    </a>


                                   <a href="{{ route('admin.orders.print', $order->id) }}"
                                        target="_blank"
                                        class="btn btn-info btn-sm text-white"
                                        title="Print Invoice"
                                        style="background-color: #0DCAF0; border-color: #0DCAF0;">
                                            <i class="fas fa-print"></i> 
                                        </a>

                                    <!-- 3. Cancel / Delete Order Button -->
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                        method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Cancel Order"
                                                onclick="return confirm('Are you sure you want to cancel/delete this order?')">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-danger fw-bold">No orders found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-end mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
