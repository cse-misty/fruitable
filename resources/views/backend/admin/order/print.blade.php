
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f4f7fc;
            font-family:'Inter',sans-serif;
            color:#2d3748;
            padding:30px 15px;
        }

        .invoice-wrapper{
            max-width:1000px;
            margin:auto;
            background:#fff;
            border-radius:15px;
            padding:40px;
            box-shadow:0 10px 35px rgba(0,0,0,.08);
        }

        .brand-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            border-bottom:3px solid #0d6efd;
            padding-bottom:25px;
            margin-bottom:35px;
        }

        .company-logo{
            width:80px;
            height:80px;
            object-fit:contain;
        }

        .company-name{
            font-size:28px;
            font-weight:800;
            color:#0d6efd;
            margin-top:10px;
        }

        .company-text{
            color:#6c757d;
            font-size:14px;
        }

        .invoice-title{
            font-size:48px;
            font-weight:800;
            color:#0d6efd;
            line-height:1;
        }

        .invoice-badge{
            display:inline-block;
            background:#0d6efd;
            color:#fff;
            padding:8px 18px;
            border-radius:30px;
            font-weight:600;
            margin-top:10px;
        }

        .info-card{
            background:#f8fafc;
            border:1px solid #e9ecef;
            border-radius:12px;
            padding:20px;
            height:100%;
        }

        .section-title{
            font-size:13px;
            font-weight:700;
            color:#0d6efd;
            text-transform:uppercase;
            margin-bottom:12px;
        }

        .custom-table{
            border-radius:12px;
            overflow:hidden;
        }

        .custom-table thead{
            background:#0d6efd;
            color:#fff;
        }

        .custom-table th{
            padding:15px;
            border:none;
            font-weight:600;
        }

        .custom-table td{
            padding:15px;
            vertical-align:middle;
        }

        .custom-table tbody tr:nth-child(even){
            background:#f8fafc;
        }

        .summary-card{
            background:#f8fafc;
            border-radius:12px;
            padding:20px;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            margin-bottom:10px;
        }

        .summary-row:last-child{
            margin-bottom:0;
        }

        .grand-total{
            background:#0d6efd;
            color:#fff;
            border-radius:12px;
            padding:20px;
            margin-top:15px;
        }

        .grand-total h2{
            margin:0;
            font-size:34px;
            font-weight:800;
        }

        .status-badge{
            display:inline-block;
            background:#198754;
            color:white;
            padding:8px 15px;
            border-radius:30px;
            font-size:13px;
            font-weight:600;
        }

        .footer{
            border-top:1px solid #dee2e6;
            margin-top:50px;
            padding-top:25px;
        }

        .signature-line{
            width:220px;
            border-bottom:1px solid #000;
            margin-left:auto;
            margin-bottom:8px;
        }

        .print-btn{
            margin-bottom:20px;
        }

        @media print{

            body{
                background:#fff;
                padding:0;
            }

            .invoice-wrapper{
                box-shadow:none;
                border:none;
                max-width:100%;
            }

            .no-print{
                display:none !important;
            }

            *{
                -webkit-print-color-adjust:exact !important;
                print-color-adjust:exact !important;
            }
        }
    </style>
</head>

<body>

<div class="text-center mb-4 no-print">

    <button onclick="window.print()" class="btn btn-primary px-4">
        Print / Save PDF
    </button>

    <button onclick="window.close()" class="btn btn-secondary px-4">
        Close
    </button>

</div>

<div class="invoice-wrapper">

    {{-- Header --}}
    <div class="brand-header">

        <div>

            {{-- <img
                src="{{ asset('frontend/assets/logo.png') }}"
                alt="Logo"
                class="company-logo"> --}}

            <div class="company-name">
                Order Print
            </div>



        </div>

        <div class="text-end">

            <div class="invoice-title">
                INVOICE
            </div>

            <div class="invoice-badge">
                #INV-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
            </div>

            <div class="mt-3">
                <strong>Date:</strong>
                {{ $order->created_at ? $order->created_at->format('d M Y') : now()->format('d M Y') }}
            </div>

        </div>

    </div>

    {{-- Customer & Company --}}
    <div class="row g-4 mb-4">

        <div class="col-md-6">

            <div class="info-card">

                <div class="section-title">
                    Bill To
                </div>

                <h5>{{ $order->user->name ?? 'Customer Name' }}</h5>
                <p class="mb-1">
                    Phone: {{ $order->user->email ?? 'N/A' }}
                </p>

                <p class="mb-1">
                    Phone: {{ $order->user->phone ?? 'N/A' }}
                </p>

                  <div class="mt-3">
                <strong>Date:</strong>
                {{ $order->created_at ? $order->created_at->format('d M Y') : now()->format('d M Y') }}
            </div>

                 <p class="mb-1">
                    Pickup:
                    {{ $order->picked_at ? $order->picked_at->format('d M Y') : '-' }}
                </p>

                <p class="mb-0">
                    Delivery:
                    {{ $order->delivered_at ? $order->delivered_at->format('d M Y') : '-' }}
                </p>

            </div>

        </div>

        {{-- <div class="col-md-6">

            <div class="info-card">

                <div class="section-title">
                    Company Information
                </div>

                <h5>Laundry Service</h5>

                <p class="mb-1">
                    Mobile: +8801711257498
                </p>

                <p class="mb-1">
                    Email: info@example.com
                </p>

                <p class="mb-0">
                    Dhaka, Bangladesh
                </p>

            </div>

        </div> --}}

    </div>

    {{-- Items Table --}}
    <table class="table custom-table mb-4">

        <thead>
        <tr>
            <th>Product Name</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Rate</th>
            <th class="text-end">Amount</th>
        </tr>
        </thead>

        <tbody>

        @foreach($order->items as $item)

            <tr>

                <td>
                    {{ $item->product->name ?? 'Product' }}
                </td>

                <td class="text-center">
                    {{ $item->quantity }}
                </td>

                <td class="text-center">
                    ৳ {{ number_format($item->price,2) }}
                </td>

                <td class="text-end fw-bold">
                    ৳ {{ number_format($item->price * $item->quantity,2) }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{-- Summary --}}
    <div class="row">

        <div class="col-md-6">

            <div class="status-badge">
                {{ ucfirst($order->payment_status ?? 'Paid') }}
            </div>

        </div>

        <div class="col-md-6">

            <div class="summary-card">

           <!-- 1. Subtotal Row -->
            <div class="summary-row d-flex justify-content-between align-items-center py-2 border-bottom">
                <span class="text-secondary fw-semibold">Subtotal</span>

                <strong class="text-dark">
                    {{ format_price($order->subtotal ?? ($order->total_amount - ($order->delivery_charge ?? 0)), 2) }}
                </strong>
            </div>

            <!-- 2. Delivery Charge Row -->
            <div class="summary-row d-flex justify-content-between align-items-center py-2 border-bottom">
                <span class="text-secondary fw-semibold">Delivery Charge</span>
                <strong class="text-dark">
                    {{ format_price($order->delivery_charge ?? 0, 2) }}
                </strong>
            </div>


            </div>


        <div class="grand-total d-flex justify-content-between align-items-center p-3 rounded" style="background-color: #e9ecef; margin-top: 10px;">

            <h4 class="mb-0 fw-bold text-secondary" style="font-size: 18px;">Total Payable</h4>


            <h3 class="mb-0 fw-bold text-dark text-end" style="font-size: 22px;">
                 {{ format_price($order->total_amount ?? 97.2, 2) }}
            </h3>

        </div>


        </div>

    </div>



</div>

<script>
window.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        window.print();
    }, 500);
});
</script>

</body>
</html>

