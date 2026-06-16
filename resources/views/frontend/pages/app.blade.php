@extends('frontend.layouts')
@section('content')



        <!-- Hero Start -->
        {{-- <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                        <h1 class="mb-5 display-3 text-primary">	Organic Veggies & Fruits Foods</h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{asset('frontend/assets/img/hero-img-1.png')}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fuitable</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{asset('frontend/assets/img/hero-img-2.jpg')}}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitable</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">

                    @php
                        $sliderSingle = method_exists($heroSliders, 'first')
                            ? $heroSliders->first()
                            : $heroSliders;
                    @endphp

                    @if($sliderSingle)

                        <div class="col-md-12 col-lg-7">
                            <h4 class="mb-3 text-secondary">
                                {{ $sliderSingle->sub_title ?? '100% Organic Foods' }}
                            </h4>

                            <h1 class="mb-5 display-3 text-primary">
                                {{ $sliderSingle->main_title ?? 'Organic Veggies & Fruits Foods' }}
                            </h1>

                            <h5 class="p-2 text-black">
                                {{ $sliderSingle->badge_text }}
                            </h5>

                            <div class="position-relative mx-auto">
                                <input
                                    class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill"
                                    type="text"
                                    placeholder="Search">

                                <button
                                    type="submit"
                                    class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                                    style="top:0; right:25%;">
                                    Submit Now
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-5">

                            <div id="carouselHero"
                                class="carousel slide position-relative"
                                data-bs-ride="carousel"
                                data-bs-interval="3000">

                                <div class="carousel-inner">

                                    @php
                                        $imagesArray = is_array($sliderSingle->image)
                                            ? $sliderSingle->image
                                            : [];

                                        $buttonTexts = [
                                            0 => $sliderSingle->text_one ?? 'Fruites',
                                            1 => $sliderSingle->text_two ?? 'Vegetables',
                                        ];
                                    @endphp

                                    @forelse($imagesArray as $imgIndex => $imagePath)

                                        <div class="carousel-item {{ $imgIndex == 0 ? 'active' : '' }}">

                                            <img
                                                src="{{ asset('storage/' . $imagePath) }}"
                                                class="img-fluid w-100 rounded"
                                                alt="Slide {{ $imgIndex + 1 }}"
                                                onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/hero-img-1.png') }}';">

                                            <a href="#" class="btn px-4 py-2 text-white rounded">
                                                {{ $buttonTexts[$imgIndex] ?? ($sliderSingle->badge_text ?? 'View') }}
                                            </a>

                                        </div>

                                    @empty

                                        <div class="carousel-item active">
                                            <img
                                                src="{{ asset('frontend/assets/img/hero-img-1.png') }}"
                                                class="img-fluid w-100 rounded"
                                                alt="First Slide">

                                            <a href="#" class="btn px-4 py-2 text-white rounded">
                                                Fruites
                                            </a>
                                        </div>

                                        <div class="carousel-item">
                                            <img
                                                src="{{ asset('frontend/assets/img/hero-img-2.jpg') }}"
                                                class="img-fluid w-100 rounded"
                                                alt="Second Slide">

                                            <a href="#" class="btn px-4 py-2 text-white rounded">
                                                Vegetables
                                            </a>
                                        </div>

                                    @endforelse

                                </div>

                                <button class="carousel-control-prev"
                                        type="button"
                                        data-bs-target="#carouselHero"
                                        data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>

                                <button class="carousel-control-next"
                                        type="button"
                                        data-bs-target="#carouselHero"
                                        data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>

                            </div>

                        </div>

                    @endif

                </div>
            </div>
        </div>
        <!-- Hero End -->

       <!--  / Category Section Start -->

            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="section-title mb-0">Product Category</h3>

                    <a href="{{ route('web.category') }}" class="view-all-btn">View All</a>

                </div>

                <!-- GRID -->
                <div class="row g-4 text-center">
                    @foreach ($categories as $category)

                    <div class="col-6 col-md-3 category-item">

                             <img src="{{ asset('storage/' . $category->image) }}"
                                class="img-fluid category-img"
                                alt="{{ $category->title }}">
                                <div class="py-3">
                                    <a href="#" class="category-title">{{ $category->title }}</a>
                                </div>
                        </div>
                    @endforeach
{{--
                    <div class="col-6 col-md-3 category-item">
                        <img src="{{asset('frontend/assets/img/fruite-item-2.jpg')}}" class="img-fluid" alt="">
                        <div class="py-3">
                            <a href="#" class="category-title">Fresh Apple</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 category-item">
                        <img src="{{asset('frontend/assets/img/fruite-item-3.jpg')}}" class="img-fluid" alt="">
                        <div class="py-3">
                            <a href="#" class="category-title">Green Broccoli</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 category-item">
                        <img src="{{asset('frontend/assets/img/fruite-item-4.jpg')}}" class="img-fluid" alt="">
                        <div class="py-3">
                            <a href="#" class="category-title">Fresh Orange</a>
                        </div>
                    </div> --}}

                </div>
            </div>

        <!--  / Category Section End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">

                <div class="tab-class text-center">

                    <div class="row g-4">

                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>

                        <!-- CATEGORY TABS -->
                        <div class="col-lg-8 text-end">

                            <ul class="nav nav-pills d-inline-flex text-center mb-5">

                                <!-- ALL PRODUCTS -->
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active"
                                    data-bs-toggle="pill"
                                    href="#tab-all">
                                        <span class="text-dark" style="width: 130px;">
                                            All Products
                                        </span>
                                    </a>
                                </li>

                                <!-- DYNAMIC CATEGORIES -->
                                @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a class="d-flex m-2 py-2 bg-light rounded-pill"
                                        data-bs-toggle="pill"
                                        href="#tab-{{ $category->id }}">
                                            <span class="text-dark" style="width: 130px;">
                                                {{ $category->title }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>

                    <!-- TAB CONTENT -->
                    <div class="tab-content">

                        <!-- ALL PRODUCTS -->
                        <div id="tab-all" class="tab-pane fade show p-0 active">
                            <div class="row g-4">

                                @foreach($categories as $category)
                                    @foreach($category->products as $product)

                                        <div class="col-md-6 col-lg-4 col-xl-3">

                                            <div class="rounded position-relative fruite-item">

                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/'.$product->image) }}"
                                                        class="img-fluid w-100 rounded-top">
                                                </div>

                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top:10px; left:10px;">
                                                    {{ $category->title }}
                                                </div>

                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">

                                                    <h4>{{ $product->name }}</h4>

                                                    <p>{{ $product->description }}</p>

                                                    <div class="d-flex justify-content-between flex-lg-wrap">

                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ format_price($product->price, 2) }}
                                                        </p>

                                                        <a href="{{ route('web.shop-details', $product->id) }}"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                                            Add to cart
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach
                                @endforeach

                            </div>
                        </div>

                        <!-- CATEGORY WISE TAB -->
                        @foreach($categories as $category)

                            <div id="tab-{{ $category->id }}" class="tab-pane fade p-0">

                                <div class="row g-4">

                                    @forelse($category->products as $product)

                                        <div class="col-md-6 col-lg-4 col-xl-3">

                                            <div class="rounded position-relative fruite-item">

                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/'.$product->image) }}"
                                                        class="img-fluid w-100 rounded-top">
                                                </div>

                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top:10px; left:10px;">
                                                    {{ $category->title }}
                                                </div>

                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">

                                                    <h4>{{ $product->name }}</h4>

                                                    <p>{{ $product->description }}</p>

                                                    <div class="d-flex justify-content-between flex-lg-wrap">

                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ format_price($product->price, 2) }}
                                                        </p>

                                                        <a href="{{ route('web.shop-details', $product->id) }}"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                                            Add to cart
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @empty
                                        <div class="col-12">
                                            <p>No products found in {{ $category->title }}</p>
                                        </div>
                                    @endforelse

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Product Services -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                   <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="section-title mb-0">{{ $services->service_title }}</h3>

                    <a href="{{ route('web.shopping') }}" class="view-all-btn">View All</a>

                </div>

                <div class="row g-4 justify-content-center">
                    {{-- <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="{{asset('frontend/assets/img/featur-1.jpg')}}" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Fresh Apples</h5>
                                        <h3 class="mb-0">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <!-- Fresh Apple--->

                    @if(($services->fresh_status ?? 1) == 1)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ $services->fresh_link ?? '#' }}">
                                <!-- আগের সব বুটস্ট্র্যাপ ক্লাস (bg-secondary rounded border border-secondary) ঠিক রাখা হলো -->
                                <div class="service-item bg-secondary rounded border border-secondary"
                                    style="background-color: {{ $services->fresh_bg_color }} !important; border-color: {{ $services->fresh_bg_color }} !important;">

                                    <!-- ইমেজের অরিজিনাল ক্লাস ঠিক রেখে শুধু ডাইনামিক সোর্স দেওয়া হলো (কোনো ফিক্সড হাইট ছাড়া) -->
                                    @if(!empty($services->fresh_image))
                                        <img src="{{ asset('uploads/services/' . $services->fresh_image) }}" class="img-fluid rounded-top w-100" alt="Fresh Image">
                                    @else
                                        <img src="{{ asset('frontend/assets/img/featur-1.jpg') }}" class="img-fluid rounded-top w-100" alt="Default Image">
                                    @endif

                                    <div class="px-4 rounded-bottom">
                                        <!-- আগের সব ক্লাস (service-content bg-primary text-center p-4 rounded) ঠিক রেখে ব্যাকগ্রাউন্ড কালার ডাইনামিক করা হলো -->
                                        <div class="service-content bg-primary text-center p-4 rounded"
                                            style="background-color: {{ $services->fresh_content_bg_color }} !important;">

                                            <!-- Title এবং এর কালার ডাইনামিক -->
                                            <h5 class="text-white" style="color: {{ $services->fresh_title_color }} !important;">
                                                {{ $services->fresh_title ?? 'Fresh Apples' }}
                                            </h5>

                                            <!-- Offer এবং এর কালার ডাইনামিক -->
                                            <h3 class="mb-0" style="color: {{ $services->fresh_offer_color }} !important;">
                                                {{ $services->fresh_offer_text ?? '20% OFF' }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <!-- Testy Furites--->

               @if(($services->tasty_status ?? 1) == 1)
                    <div class="col-md-6 col-lg-4">

                        <a href="{{ $services->tasty_link ?? '#' }}">

                            <div class="service-item bg-dark rounded border border-dark"
                                style="background-color: {{ $services->tasty_bg_color }} !important; border-color: {{ $services->tasty_bg_color }} !important;">


                                @if(!empty($services->tasty_image))
                                    <img src="{{ asset('uploads/services/' . $services->tasty_image) }}" class="img-fluid rounded-top w-100" alt="Tasty Image">
                                @else
                                    <img src="{{ asset('frontend/assets/img/featur-2.jpg') }}" class="img-fluid rounded-top w-100" alt="Default Tasty Image">
                                @endif

                                <div class="px-4 rounded-bottom">

                                    <div class="service-content bg-light text-center p-4 rounded"
                                        style="background-color: {{ $services->tasty_content_bg_color }} !important;">


                                        <h5 class="text-primary" style="color: {{ $services->tasty_title_color }} !important;">
                                            {{ $services->tasty_title ?? 'Tasty Fruits' }}
                                        </h5>


                                        <h3 class="mb-0" style="color: {{ $services->tasty_offer_color }} !important;">
                                            {{ $services->tasty_offer_text ?? 'Free delivery' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

            <!-- Exotic Vegitable--->

                    @if(($services->exotic_status ?? 1) == 1)
                        <div class="col-md-6 col-lg-4">

                            <a href="{{ $services->exotic_link ?? '#' }}">

                                <div class="service-item bg-primary rounded border border-primary"
                                    style="background-color: {{ $services->exotic_bg_color }} !important; border-color: {{ $services->exotic_bg_color }} !important;">


                                    @if(!empty($services->exotic_image))
                                        <img src="{{ asset('uploads/services/' . $services->exotic_image) }}" class="img-fluid rounded-top w-100" alt="Exotic Image">
                                    @else
                                        <img src="{{ asset('frontend/assets/img/featur-3.jpg') }}" class="img-fluid rounded-top w-100" alt="Default Exotic Image">
                                    @endif

                                    <div class="px-4 rounded-bottom">

                                        <div class="service-content bg-secondary text-center p-4 rounded"
                                            style="background-color: {{ $services->exotic_content_bg_color }} !important;">


                                            <h5 class="text-white" style="color: {{ $services->exotic_title_color }} !important;">
                                                {{ $services->exotic_title ?? 'Exotic Vegitable' }}
                                            </h5>


                                            <h3 class="mb-0" style="color: {{ $services->exotic_offer_color }} !important;">
                                                {{ $services->exotic_offer_text ?? 'Discount 30$' }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- Product Services -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">Fresh Organic Vegetables</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-1.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-3.png')}}" class="img-fluid w-100 rounded-top bg-light" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Banana</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-4.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Bell Papper</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-5.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Potatoes</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{asset('frontend/assets/img/vegetable-item-6.jpg')}}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                        <div class="p-4 rounded-bottom">
                            <h4>Parsely</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="{{asset('frontend/assets/img/baner-1.png')}}" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">50$</span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-1.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-2.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-3.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-4.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-5.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('frontend/assets/img/best-product-6.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="text-center">
                                <img src="{{asset('frontend/assets/img/fruite-item-1.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="py-4">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3 justify-content-center">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="text-center">
                                <img src="{{asset('frontend/assets/img/fruite-item-2.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="py-4">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3 justify-content-center">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="text-center">
                                <img src="{{asset('frontend/assets/img/fruite-item-3.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="py-4">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3 justify-content-center">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="text-center">
                                <img src="{{asset('frontend/assets/img/fruite-item-4.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="py-2">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3 justify-content-center">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>satisfied customers</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality of service</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality certificates</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Available Products</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->


        <!-- Tastimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Testimonial</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="{{asset('frontend/assets/img/testimonial-1.jpg')}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="{{asset('frontend/assets/img/testimonial-1.jpg')}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="{{asset('frontend/assets/img/testimonial-1.jpg')}}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Client Name</h4>
                                    <p class="m-0 pb-3">Profession</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tastimonial End -->

@endsection
