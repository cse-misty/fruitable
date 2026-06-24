@extends('frontend.layouts')
@section('content')
  <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Organic Product</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Organic Produc</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class">
            <div class="row g-4">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <h1>Organic Products</h1>
                    <a href="{{ route('web.category') }}" class="btn btn-primary rounded-pill px-4">View All</a>
                </div>

              <div class="col-lg-12">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <!-- ALL PRODUCTS -->
                        <li class="nav-item p-2">
                            <a class="d-flex rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                                <span class="text-dark p-2" style="width: 130px; display: inline-block;">All Product</span>
                            </a>
                        </li>

                        <!-- DYNAMIC CATEGORIES -->
                        @foreach($categories as $category)
                            <li class="nav-item p-2">
                                <a class="d-flex rounded-pill" data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                    <span class="text-black p-2" style="width: 130px; display: inline-block;">{{ $category->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <!-- TAB CONTENT -->
            <div class="tab-content">

                <!-- ALL PRODUCTS TAB -->
                <div id="tab-all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($categories->flatMap->products->take(4) as $product)
                            <div class="col-md-6 col-lg-4 col-xl-3">

                                <div class="rounded position-relative fruite-item border border-secondary"
                                     onclick="window.location='{{ route('web.shop-details', $product->id) }}'"
                                     style="cursor: pointer; transition: 0.3s; background: #fff;">

                                    <div class="fruite-img">
                                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid w-100 rounded-top" style="height: 230px; object-fit: cover;">
                                    </div>

                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px; z-index: 10;">
                                        <span>{{ $product->category->title ?? 'Organic' }}</span>
                                    </div>


                                    <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px; z-index: 12;" onclick="event.stopPropagation();">
                                        @csrf
                                        <button type="submit" class="btn btn-white shadow rounded-circle d-flex align-items-center justify-content-center border border-1 " style="width: 35px; height: 35px; padding: 0; background: white;">
                                            <i class="bi bi-heart text-danger fs-5"></i>
                                        </button>
                                    </form>
                                    <div class="p-4 border-top-0 rounded-bottom">

                                        <div class="d-flex justify-content-between align-items-center mb-2 gap-2">

                                            <h4 class="text-dark mb-0 text-truncate" style="max-width: 70%;">{{ $product->name }}</h4>


                                            <div class="d-flex text-primary font-12 flex-shrink-0">
                                                @php $rating = round($product->rating ?? 5); @endphp
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $rating)
                                                        <i class="fas fa-star"></i> <!-- গোল্ডেন স্টার -->
                                                    @else
                                                        <i class="fas fa-star text-muted" style="color: #e4e5e9 !important;"></i> <!-- খালি স্টার -->
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>


                                        <p class="text-muted" style="height: 45px; overflow: hidden;">{{ Str::limit($product->description, 60) }}</p>

                                   
                                        <div class="d-flex justify-content-between align-items-center" onclick="event.stopPropagation();">
                                            <p class="text-dark fs-5 fw-bold mb-0">
                                                {{ format_price($product->price, 2) }}
                                            </p>
                                            <a href="{{ route('web.shop-details', $product->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary bg-white hover-btn">
                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                            </a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- CATEGORY WISE TAB  -->
                @foreach($categories as $category)
                    <div id="tab-{{ $category->id }}" class="tab-pane fade p-0">
                        <div class="row g-4">
                            @forelse($category->products->take(4) as $product)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item border border-secondary"
                                         onclick="window.location='{{ route('web.shop-details', $product->id) }}'"
                                         style="cursor: pointer; transition: 0.3s; background: #fff;">

                                        <div class="fruite-img">
                                            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid w-100 rounded-top" style="height: 230px; object-fit: cover;">
                                        </div>

                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top:10px; left:10px; z-index: 10;">
                                            {{ $category->title }}
                                        </div>

                                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px; z-index: 12;" onclick="event.stopPropagation();">
                                            @csrf
                                            <button type="submit" class="btn btn-white shadow rounded-circle d-flex align-items-center justify-content-center border border-1" style="width: 35px; height: 35px; padding: 0; background: white;">
                                                <i class="bi bi-heart text-danger fs-5"></i>
                                            </button>
                                        </form>

                                        <div class="p-4 border-top-0 rounded-bottom">
                                            <h4 class="text-dark">{{ $product->name }}</h4>
                                            <p class="text-muted" style="height: 45px; overflow: hidden;">{{ Str::limit($product->description, 60) }}</p>

                                            <div class="d-flex justify-content-between align-items-center" onclick="event.stopPropagation();">
                                                <p class="text-dark fs-5 fw-bold mb-0">
                                                    {{ format_price($product->price, 2) }}
                                                </p>
                                                <a href="{{ route('web.shop-details', $product->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary bg-white">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-4">
                                    <p class="text-muted">No products found in {{ $category->title }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>



@endsection
