@extends('frontend.layouts')
@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session()->has('cart') && count(session('cart')) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subTotal = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php
                                $itemTotal = $item['price'] * $item['quantity'];
                                $subTotal += $itemTotal;
                            @endphp
                            <tr data-id="{{ $id }}">
                               <th scope="row">
                                    <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('frontend/assets/img/vegetable-item-3.png') }}"
                                        class="img-fluid rounded-circle"
                                        style="width: 90px; height: 90px; object-fit: cover;"
                                        alt="">
                                </th>

                                <td>
                                    <p class="mb-0 mt-4">{{ $item['name'] }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ format_price($item['price'], 2) }}</p>
                                </td>
                                <td>

                                    <div class="input-group quantity mt-4" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border change-quantity m-1" data-action="minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0 qty-input" value="{{ $item['quantity'] }}" readonly>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border change-quantity m-1" data-action="plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4 item-total">{{ format_price($itemTotal, 2) }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="row g-4 justify-content-end mt-5">
                <div class="col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0" id="cart-subtotal">{{ format_price($subTotal, 2) }}</p> 
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <p class="mb-0">Flat rate: {{ format_price(60, 2) }}</p>
                            </div>



                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4" id="cart-grandtotal">{{ format_price($subTotal + 60, 2) }}</p>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4 w-75 text-center">Proceed Checkout</a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fa fa-shopping-cart fa-4x text-muted mb-3"></i>
                <h3>Your cart is empty!</h3>
                <a href="{{ route('web.shopping') }}" class="btn btn-primary mt-3 px-4">Continue Shopping</a>
            </div>
        @endif
    </div>
</div>
<!-- Cart Page End -->

<script src="https://jquery.com"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    function updateCartTotal() {
        let subtotal = 0;

        document.querySelectorAll('tr[data-id]').forEach(function (row) {
            // price extract (safe method)
            let priceText = row.querySelector('td:nth-child(3) p').innerText;
            let price = parseFloat(priceText.replace(/[^0-9.]/g, ''));

            let qty = parseInt(row.querySelector('.qty-input').value);
            let total = price * qty;

            // update item total
            row.querySelector('.item-total').innerText = '৳ ' + total.toFixed(2);

            subtotal += total;
        });

        // update subtotal
        document.getElementById('cart-subtotal').innerText = '৳ ' + subtotal.toFixed(2);

        // shipping fixed
        let shipping = 60;

        // update grand total
        document.getElementById('cart-grandtotal').innerText = '৳ ' + (subtotal + shipping).toFixed(2);
    }

    // plus / minus button click
    document.querySelectorAll('.change-quantity').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            // 💡 ডাবল ট্রিগার হওয়া বন্ধ করবে এবং কোয়ান্টিটি নিখুঁতভাবে ১ করে বাড়াবে/কমাবে
            e.preventDefault();
            e.stopImmediatePropagation();

            let row = this.closest('tr');
            let input = row.querySelector('.qty-input');
            let currentQty = parseInt(input.value);

            if (this.dataset.action === 'plus') {
                input.value = currentQty + 1;
            }

            if (this.dataset.action === 'minus') {
                if (currentQty > 1) {
                    input.value = currentQty - 1;
                }
            }

            updateCartTotal();
        });
    });

});
</script>



@endsection
