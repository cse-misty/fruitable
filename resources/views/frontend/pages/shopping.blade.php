@extends('frontend.layouts')
@section('content')



        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shopping/Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Popularity</option>
                                        <option value="opel">Organic</option>
                                        <option value="audi">Fantastic</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                          <ul class="list-unstyled fruite-categorie">

                                                @foreach($categories as $category)
                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a href="{{ route('web.shopping', ['category_id' => $category->id]) }}">
                                                                {{ $category->title }}
                                                            </a>
                                                            <span>({{ $category->products->count() }})</span>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                        </div>
                                    </div>
                               <div class="col-lg-12">

                                    <form action="{{ url()->current() }}" method="GET" id="additional-filter-form">
                                        <div class="mb-3">
                                            <h4>Additional Filter</h4>

                                            <!-- ১. Organic Filter -->
                                            <div class="mb-2">
                                                <input type="radio" class="me-2 filter-radio" id="filter-organic" name="type" value="organic"
                                                    {{ request('type') == 'organic' ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label for="filter-organic" style="cursor: pointer;">Organic</label>
                                            </div>

                                            <!-- ২. Fresh Filter -->
                                            <div class="mb-2">
                                                <input type="radio" class="me-2 filter-radio" id="filter-fresh" name="type" value="fresh"
                                                    {{ request('type') == 'fresh' ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label for="filter-fresh" style="cursor: pointer;">Fresh</label>
                                            </div>

                                            <!-- ৩. Sales Filter -->
                                            <div class="mb-2">
                                                <input type="radio" class="me-2 filter-radio" id="filter-sales" name="type" value="sales"
                                                    {{ request('type') == 'sales' ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label for="filter-sales" style="cursor: pointer;">Sales / Hot Items</label>
                                            </div>

                                            <!-- ৪. Discount Filter -->
                                            <div class="mb-2">
                                                <input type="radio" class="me-2 filter-radio" id="filter-discount" name="type" value="discount"
                                                    {{ request('type') == 'discount' ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label for="filter-discount" style="cursor: pointer;">Discounted</label>
                                            </div>

                                            <!-- ৫. Clear Filter Button  -->
                                            @if(request('type'))
                                                <div class="mt-3">
                                                    <a href="{{ url()->current() }}" class="btn btn-sm btn-danger rounded-pill px-3">Clear Filter</a>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>

                                    @forelse($featuredProducts as $product)

                                        <div class="d-flex align-items-center justify-content-start mb-3 p-2 rounded"
                                            onclick="window.location='{{ route('web.shop-details', $product->id) }}'"
                                            style="cursor: pointer; transition: 0.3s; background: #fff; border: 1px solid #f3f3f3;">


                                            <div class="rounded me-4 overflow-hidden" style="width: 80px; height: 80px; flex-shrink: 0;">
                                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 h-100 rounded" alt="{{ $product->name }}" style="object-fit: cover;">
                                            </div>

                                            <div class="overflow-hidden">

                                                <h6 class="mb-2 text-dark text-truncate">{{ $product->name }}</h6>


                                                <div class="d-flex mb-2 text-secondary font-12">
                                                    @php $rating = round($product->rating ?? 5); @endphp
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $rating)
                                                            <i class="fa fa-star text-secondary"></i> <!-- গোল্ডেন স্টার -->
                                                        @else
                                                            <i class="fa fa-star text-muted" style="color: #e4e5e9 !important;"></i> <!-- খালি স্টার -->
                                                        @endif
                                                    @endfor
                                                </div>


                                                <div class="d-flex align-items-center mb-2">
                                                    <h5 class="fw-bold me-2 mb-0" style="font-size: 1rem;">
                                                        {{ format_price($product->price ?? 0, 2) }}
                                                    </h5>


                                                    @if(isset($product->old_price) || isset($product->discount_price))
                                                        <h5 class="text-danger text-decoration-line-through mb-0" style="font-size: 0.9rem;">
                                                            {{ format_price($product->old_price ?? ($product->price * 1.2), 2) }}
                                                        </h5>
                                                    @else

                                                        <h5 class="text-danger text-decoration-line-through mb-0" style="font-size: 0.85rem; opacity: 0.7;">
                                                            {{ format_price(($product->price * 1.25), 2) }}
                                                        </h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-3 text-muted" style="font-size: 0.9rem;">
                                            No featured products listed.
                                        </div>
                                    @endforelse

                                    <div class="d-flex justify-content-center my-4">
                                        <a href="{{ route('web.organic-product') }}" class="btn border border-secondary px-4 py-2 rounded-pill text-primary w-100 font-weight-bold">
                                            View More
                                        </a>
                                    </div>
                                </div>



                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="{{asset('frontend/assets/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">

                                @foreach($products as $index => $product)
                                    <div class="col-md-6 col-lg-6 col-xl-4 mb-4">


                                        <div class="rounded position-relative fruite-item border border-secondary h-100 d-flex flex-column"
                                            onclick="window.location='{{ route('web.shop-details', $product->id) }}'"
                                            style="cursor: pointer; transition: 0.3s; background: #fff;">

                                            <!-- IMAGE BOX -->
                                            <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                                <img src="{{ asset('storage/'.$product->image) }}"
                                                    class="img-fluid w-100 h-100"
                                                    style="object-fit: cover;"
                                                    alt="{{ $product->name }}">
                                            </div>

                                            <!-- CATEGORY TAG -->
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px; font-size: 12px; z-index: 10;">
                                                {{ $product->category->title ?? 'Organic' }}
                                            </div>


                                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px; z-index: 12;" onclick="event.stopPropagation();">
                                                @csrf
                                                <button type="submit" class="btn btn-white shadow rounded-circle d-flex align-items-center justify-content-center border " style="width: 35px; height: 35px; padding: 0; background: white;">
                                                    <i class="bi bi-heart text-danger fs-5"></i>
                                                </button>
                                            </form>

                                            <!-- CONTENT -->
                                            <div class="p-3 border-top-0 rounded-bottom d-flex flex-column flex-grow-1">


                                                <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
                                                    <h5 class="mb-0 text-dark text-truncate" style="max-width: 65%;">{{ $product->name }}</h5>


                                                    <div class="d-flex text-primary font-12 flex-shrink-0">
                                                        @php $rating = round($product->rating ?? 5); @endphp
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="fas fa-star text-muted" style="color: #e4e5e9 !important;"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>


                                                <p class="small text-muted flex-grow-1" style="height: 45px; overflow: hidden;">
                                                    {{ Str::limit($product->description, 70) }}
                                                </p>


                                                <div class="d-flex justify-content-between align-items-center mt-auto pt-2" onclick="event.stopPropagation();">
                                                    <p class="text-dark fw-bold mb-0">
                                                        {{ format_price($product->price) }}
                                                    </p>

                                                    <a href="{{ route('web.shop-details', $product->id) }}"
                                                    class="btn btn-sm border border-secondary rounded-pill px-3 text-primary bg-white">
                                                        <i class="fa fa-shopping-bag me-1 text-primary"></i> Add to cart
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach


                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-center">
                                        {{ $products->links() }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

@endsection
