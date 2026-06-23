@extends('backend.dashboard')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-scondery text-dark d-flex justify-content-between align-items-center">
            <h4 class=" pt-3">Manege Order List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="orderMenage" class="display">
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
                                <td>{{ format_price($order->total_amount, 2) }}</td>
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

                                <!-- 2. Print Invoice Button -->
                                <button type="button"
                                        class="btn btn-info btn-sm text-white"
                                        title="Print Invoice"
                                        onclick="openInvoiceModal('{{ $order->id }}')"
                                        style="background-color: #0DCAF0; border-color: #0DCAF0;">
                                    <i class="fas fa-print"></i>
                                </button>


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
                                        <!-- Print Invoice Modal -->
                                <div class="modal fade" id="printInvoiceModal{{ $order->id }}" tabindex="-1" aria-labelledby="printInvoiceModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="max-width: 850px;">
                                        <div class="modal-content" style="border-radius: 15px; overflow: hidden; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">

                                            <!-- Modal Header -->
                                        <!-- Modal Header -->
                                <div class="modal-header no-print bg-light" style="border-bottom: 1px solid #e9ecef; padding: 15px 25px;">
                                    <h5 class="modal-title fw-bold" id="printInvoiceModalLabel{{ $order->id }}" style="color: #764ba2; font-size: 16px;">Invoice #{{ $order->id }}</h5>
                                    <div>
                                        <button type="button" onclick="printModalContent('printInvoiceModal{{ $order->id }}')" class="btn btn-primary btn-sm me-2" style="background: #667eea; border-color: #667eea; font-weight: 500;">
                                            <i class="fas fa-print"></i> Print / Save PDF
                                        </button>
                                        <!-- ক্লোজ বাটনে কাস্টম জাভাস্ক্রিপ্ট ইভেন্ট (closeInvoiceModal) যুক্ত করা হয়েছে -->
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="closeInvoiceModal('{{ $order->id }}')">Close</button>
                                    </div>
                                </div>


                                            <!-- Modal Body -->
                                            <div class="modal-body text-start" style="background:#f4f7fc; padding: 0;">
                                                <div class="invoice-wrapper" style="background: #fff; max-width: 100%;">

                                                    {{-- Purple Gradient Header --}}
                                                    <div class="invoice-gradient-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 5px 10px;">
                                                        <div style="font-size: 20px; font-weight: 400; margin-bottom: 10px; line-height: 1; letter-spacing: -0.5px; padding-top: 5px;">INVOICE</div>
                                                        <div class="d-flex gap-4" style="font-size: 13px; opacity: 0.9;">
                                                            <div><strong>Invoice #:</strong> #INV-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</div>
                                                            <div><strong>Status:</strong> {{ strtoupper($order->order_status ?? $order->status ?? 'PENDING') }}</div>
                                                        </div>
                                                    </div>

                                                    {{-- Content Wrapper --}}
                                                    <div style="padding: 35px 40px;">

                                                        {{-- Parties (From / To) --}}
                                                        <div class="d-flex justify-content-between mb-4" style="background: #f8f9fa; padding: 25px; border-radius: 12px; border: 1px solid #e9ecef;">
                                                            <div>
                                                                <h3 style="color: #667eea; font-size: 12px; margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Company Info</h3>
                                                                <strong style="color: #2d3748; font-size: 15px;">Fruitables Shop</strong><br>
                                                                <span style="color: #6c757d; font-size: 13px;">Dhaka, Bangladesh</span><br>
                                                                <span style="color: #6c757d; font-size: 13px;">Email: support@fruitables.com</span>
                                                            </div>
                                                            <div style="text-align: right;">
                                                                <h3 style="color: #667eea; font-size: 12px; margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Bill To</h3>
                                                                <strong style="color: #2d3748; font-size: 15px;">{{ $order->user->name ?? 'Customer Name' }}</strong><br>
                                                                <span style="color: #6c757d; font-size: 13px;">Email: {{ $order->user->email ?? 'N/A' }}</span><br>
                                                                <span style="color: #6c757d; font-size: 13px;">Phone: {{ $order->user->phone ?? 'N/A' }}</span>

                                                                {{-- Dates Block --}}
                                                                <div class="mt-2 pt-2 border-top text-end" style="font-size: 12px; color: #4a5568; border-color: #e2e8f0 !important;">
                                                                    <div class="mb-1"><strong>Date:</strong> {{ $order->created_at ? $order->created_at->format('d M Y') : now()->format('d M Y') }}</div>
                                                                    <div class="mb-1"><strong>Pickup:</strong> {{ $order->picked_at ? $order->picked_at->format('d M Y') : '-' }}</div>
                                                                    <div class="mb-0"><strong>Delivery:</strong> {{ $order->delivered_at ? $order->delivered_at->format('d M Y') : '-' }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Items Table --}}
                                                        <div class="table-responsive" style="margin: 25px 0;">
                                                            <table class="table" style="width: 100%; border-collapse: collapse;">
                                                                <thead>
                                                                <tr style="background: #667eea; color: #000000;">
                                                                            <th style="padding: 12px 15px; text-align: left; font-weight: 700; border: none; font-size: 14px; color: #fcf9f9 !important;">Product Name</th>
                                                                            <th style="padding: 12px 15px; text-align: center; font-weight: 700; border: none; width: 80px; font-size: 14px; color: #fcf9f9 !important;">Qty</th>
                                                                            <th style="padding: 12px 15px; text-align: right; font-weight: 700; border: none; width: 130px; font-size: 14px; color: #fcf9f9 !important;">Rate</th>
                                                                            <th style="padding: 12px 15px; text-align: right; font-weight: 700; border: none; width: 130px; font-size: 14px; color: #fcf9f9 !important;">Amount</th>
                                                                        </tr>

                                                                </thead>
                                                                <tbody>
                                                                    @foreach($order->items as $item)
                                                                        <tr>
                                                                            <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef; color: #2d3748; font-size: 13px;">{{ $item->product->name ?? 'Product' }}</td>
                                                                            <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef; text-align: center; color: #2d3748; font-size: 13px;">{{ $item->quantity }}</td>
                                                                            <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef; text-align: right; color: #2d3748; font-size: 13px;"> {{ format_price($item->price, 2) }}</td>
                                                                            <td style="padding: 12px 15px; border-bottom: 1px solid #e9ecef; text-align: right; font-weight: 600; color: #2d3748; font-size: 13px;">{{ format_price($item->price * $item->quantity, 2) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        {{-- Summary & Totals Block --}}
                                                        <div class="row pt-2">
                                                            <div class="col-md-6 align-self-end">
                                                                <span class="badge bg-success px-3 py-2 rounded-pill fw-semibold" style="font-size: 12px; letter-spacing: 0.3px; text-transform: uppercase;">
                                                                    {{ $order->payment_method ?? 'Payment Method' }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div style="background: #f8f9fa; padding: 18px; border-radius: 12px; border: 1px solid #e9ecef;">
                                                                    <table style="width: 100%; margin: 0;">
                                                                        <tr>
                                                                            <td style="border: none; padding: 6px 0; color: #6c757d; font-size: 13px;">Subtotal:</td>
                                                                            <td style="border: none; padding: 6px 0; text-align: right; font-weight: 600; color: #2d3748; font-size: 13px;">
                                                                                {{ format_price($order->subtotal ?? ($order->total_amount - ($order->delivery_charge ?? 0)), 2) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border: none; padding: 6px 0; color: #6c757d; font-size: 13px;">Delivery Charge:</td>
                                                                            <td style="border: none; padding: 6px 0; text-align: right; font-weight: 600; color: #2d3748; font-size: 13px;">
                                                                                {{ format_price($order->delivery_charge ?? 0, 2) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="font-weight: bold; font-size: 18px; color: #667eea; border-top: 2px solid #667eea;">
                                                                            <td style="border: none; padding: 12px 0 0 0; color: #667eea; font-size: 15px;">Total Payable:</td>
                                                                            <td style="border: none; padding: 12px 0 0 0; text-align: right; color: #764ba2; font-weight: 800; font-size: 18px;">
                                                                                {{ format_price($order->total_amount ?? 0, 2) }}
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

<script>

    function openInvoiceModal(orderId) {
        var modalEl = document.getElementById('printInvoiceModal' + orderId);
        if(modalEl) {
            var myModal = new bootstrap.Modal(modalEl);
            myModal.show();
        } else {
            alert('Modal code matching Order ID not found!');
        }
    }


    function printModalContent(modalId) {
        var modalElement = document.querySelector('#' + modalId + ' .invoice-wrapper');
        if (!modalElement) {
            alert('Invoice element capture failed!');
            return;
        }

        var modalBody = modalElement.innerHTML;
        var printWindow = window.open('', '', 'height=850,width=1050');

        printWindow.document.write('<html><head><title>Print Invoice</title>');
        printWindow.document.write('<link href="https://jsdelivr.net" rel="stylesheet">');
        printWindow.document.write('<link href="https://googleapis.com" rel="stylesheet">');


        printWindow.document.write('<style>' +
            'body{ background:#fff; font-family:"Inter", -apple-system, sans-serif; color:#2d3748; padding:0; margin:0; }' +
            '.invoice-wrapper{ max-width:100%; margin:auto; background:#fff; }' +
            '.invoice-gradient-header{ background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; color: white !important; padding: 40px; }' +
            'th { background: #667eea !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; color: white !important; padding: 15px; text-align: left; font-weight: 600; }' +
            'td { padding: 15px; border-bottom: 1px solid #e9ecef; }' +
            '*{ -webkit-print-color-adjust:exact !important; print-color-adjust:exact !important; }' +
            '</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(modalBody);
        printWindow.document.write('</body></html>');

        printWindow.document.close();

        setTimeout(function() {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 750);
    }

     function openInvoiceModal(orderId) {
        var myModal = new bootstrap.Modal(document.getElementById('printInvoiceModal' + orderId));
        myModal.show();
    }
</script>

<script>

    function closeInvoiceModal(orderId) {
        var modalSelector = '#printInvoiceModal' + orderId;


        if (typeof $ !== 'undefined' || typeof jQuery !== 'undefined') {
            $(modalSelector).modal('hide');
        }


        var modalElement = document.getElementById('printInvoiceModal' + orderId);
        if (modalElement) {
            modalElement.classList.remove('show');
            modalElement.style.display = 'none';
            modalElement.setAttribute('aria-hidden', 'true');
        }


        var backdrops = document.querySelectorAll('.modal-backdrop');
        backdrops.forEach(function(backdrop) {
            backdrop.remove();
        });


        document.body.classList.remove('modal-open');
        document.body.style.overflow = 'auto';
        document.body.style.paddingRight = '0px';
    }
</script>




@endsection
