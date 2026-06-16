@extends('frontend.layouts')
@section('content')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <span class="text-danger">*</span></label>
                                <input type="text" name="shipping_address" class="form-control" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<span class="text-danger">*</span></label>
                                <input type="text" name="country" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<span class="text-danger">*</span></label>
                                <input type="text" name="postcode" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<span class="text-danger">*</span></label>
                                <input type="tel" name="mobile" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            <hr>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                                <label class="form-check-label" for="Address-1">Ship to a different address?</label>
                            </div>
                            <div class="form-item">
                                <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Oreder Notes (Optional)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset('frontend/assets/img/vegetable-item-2.jpg')}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">Awesome Brocoli</td>
                                            <td class="py-5">$69.00</td>
                                            <td class="py-5">2</td>
                                            <td class="py-5">$138.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset('frontend/assets/img/vegetable-item-5.jpg')}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">Potatoes</td>
                                            <td class="py-5">$69.00</td>
                                            <td class="py-5">2</td>
                                            <td class="py-5">$138.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{asset('frontend/assets/img/vegetable-item-3.png')}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">Big Banana</td>
                                            <td class="py-5">$69.00</td>
                                            <td class="py-5">2</td>
                                            <td class="py-5">$138.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-3">Subtotal</p>
                                            </td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">$414.00</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">Shipping</p>
                                            </td>
                                            <td colspan="3" class="py-5">
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-2" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                                                </div>
                                                <div class="form-check text-start">
                                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-3" name="Shipping-1" value="Shipping">
                                                    <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">$135.00</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody> --}}

                                    <tbody>
                                        @foreach($cart as $id => $item)
                                            @php
                                                $total = $item['price'] * $item['quantity'];
                                            @endphp

                                            <tr>
                                            <th scope="row">
                                        <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('frontend/assets/img/vegetable-item-3.png') }}"
                                            class="img-fluid rounded-circle"
                                            style="width: 90px; height: 90px; object-fit: cover;"
                                            alt="">
                                    </th>


                                                <td class="py-5">{{ $item['name'] }}</td>
                                                <td class="py-5">{{ format_price($item['price'], 2) }}</td>
                                                <td class="py-5">{{ $item['quantity'] }}</td>
                                                <td class="py-5">{{ format_price($total, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                        <div class="form-check text-start my-3">
                                            <input type="radio" class="form-check-input bg-primary border-0" id="Payments-Stripe" name="payment_method" value="Stripe" checked>
                                            <label class="form-check-label" for="Payments-Stripe">Stripe (Card Payment)</label>
                                        </div>

                                </div>
                            </div> --}}

                     {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">

                            <h5 class="mb-3 text-start">Select Payment Method</h5>

                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_cod"
                                    value="COD"
                                    checked>
                                <label class="form-check-label" for="payment_cod">
                                    Cash on Delivery (COD)
                                </label>
                            </div>

                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_stripe"
                                    value="Stripe">
                                <label class="form-check-label" for="payment_stripe">
                                    Stripe (Card Payment)
                                </label>
                            </div>





                        </div>
                    </div> --}}


                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">

                            <h5 class="mb-3 text-start">Select Payment Method</h5>

                            <!-- Cash on Delivery -->
                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_cod"
                                    value="COD"
                                    checked>
                                <label class="form-check-label" for="payment_cod">
                                    Cash on Delivery
                                </label>
                            </div>

                            <!-- Stripe -->
                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_stripe"
                                    value="Stripe">
                                <label class="form-check-label" for="payment_stripe">
                                    Stripe
                                </label>
                            </div>

                            <!-- Razorpay -->
                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_razorpay"
                                    value="Razorpay">
                                <label class="form-check-label" for="payment_razorpay">
                                    Razorpay
                                </label>
                            </div>

                            <!-- aamarpay -->
                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_aamarpay"
                                    value="aamarpay">
                                <label class="form-check-label" for="payment_aamarpay">
                                    aamarpay
                                </label>
                            </div>

                            <!-- Paystack -->
                            <div class="form-check text-start mb-2">
                                <input class="form-check-input"
                                    type="radio"
                                    name="payment_method"
                                    id="payment_paystack"
                                    value="Paystack">
                                <label class="form-check-label" for="payment_paystack">
                                    Paystack
                                </label>
                            </div>

                        </div>
                    </div>



                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary fw-bold">
                                    Place Order
                                </button>
                            </div>

                    </div>
                </form>
            </div>
        </div>


<!-- Single Page Header End -->

@endsection
