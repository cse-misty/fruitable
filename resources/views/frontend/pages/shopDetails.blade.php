@extends('frontend.layouts')

@section('content')

<!-- Page Header -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop Detail</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item active text-white">Shop Detail</li>
    </ol>
</div>

<!-- Main Content -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">

        <div class="row g-4 mb-5">

            <!-- LEFT SIDE -->
            <div class="col-lg-8 col-xl-9">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- PRODUCT DETAILS FORM -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf

                    <div class="row g-4">

                        <!-- IMAGE -->
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="img-fluid rounded"
                                    alt="{{ $product->name }}"
                                >
                            </div>
                        </div>

                        <!-- DETAILS -->
                        <div class="col-lg-6">

                            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>

                            <p class="mb-3">
                                Category: {{ $product->category->title ?? 'N/A' }}
                            </p>

                            <h5 class="fw-bold mb-3">
                                {{ format_price($product->price, 2) }}
                            </h5>

                            <p class="mb-4">
                                {{ $product->description }}
                            </p>

                            <!-- QUANTITY -->
                            <div class="input-group quantity mb-4" style="width: 130px;">
                                <button type="button" class="btn btn-minus bg-light border">-</button>

                                <input type="text" name="quantity" class="form-control text-center border-0" value="1">

                                <button type="button" class="btn btn-plus bg-light border">+</button>
                            </div>

                            <!-- ADD TO CART -->
                            <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 text-primary">
                                <i class="fa fa-shopping-bag me-2"></i> Add to cart
                            </button>

                        </div>
                    </div>
                </form>

                <!-- DESCRIPTION -->
                <div class="mt-5">

                    <div class="nav nav-tabs mb-3">
                        <button class="nav-link active">Description</button>
                        <button class="nav-link">Reviews</button>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE (SIDEBAR) -->
            <div class="col-lg-4 col-xl-3">

                <h4>Categories</h4>
                <ul class="list-unstyled">

                    @foreach($categories as $category)
                        <li>
                            <a href="#">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach

                </ul>

            </div>

        </div>

    </div>
</div>

@endsection
