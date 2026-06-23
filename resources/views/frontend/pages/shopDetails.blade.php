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
{{-- <div class="container-fluid py-5 mt-5">
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
</div> --}}


   <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            {{-- <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="img/single-item.jpg" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">Brocoli</h4>
                                <p class="mb-3">Category: Vegetables</p>
                                <h5 class="fw-bold mb-3">3,35 $</h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                                <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div> --}}


                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf

                                    <div class="row g-4">

                                        <div class="col-lg-6">
                                            <div class="border rounded">
                                                <img src="{{ asset('storage/'.$product->image) }}"
                                                    class="img-fluid rounded"
                                                    alt="{{ $product->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                            <h4 class="fw-bold mb-3">
                                                {{ $product->name }}
                                            </h4>

                                            <p class="mb-3">
                                                Category :
                                                {{ $product->category->title ?? 'N/A' }}
                                            </p>

                                            <h5 class="fw-bold mb-3">
                                                {{ format_price($product->price,2) }}
                                            </h5>

                                            <div class="d-flex mb-4">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>

                                            <p class="mb-4">
                                                {{ $product->description }}
                                            </p>


                                            <div class="input-group quantity mb-5"
                                                style="width:100px;">

                                                <div class="input-group-btn">

                                                    <button type="button"
                                                            class="btn btn-sm btn-minus rounded-circle bg-light border">

                                                        <i class="fa fa-minus"></i>

                                                    </button>

                                                </div>


                                                <input type="text"
                                                    name="quantity"
                                                    class="form-control form-control-sm text-center border-0"
                                                    value="1">


                                                <div class="input-group-btn">

                                                    <button type="button"
                                                            class="btn btn-sm btn-plus rounded-circle bg-light border">

                                                        <i class="fa fa-plus"></i>

                                                    </button>

                                                </div>

                                            </div>



                                            <button type="submit"
                                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">

                                                <i class="fa fa-shopping-bag me-2 text-primary"></i>

                                                Add to cart

                                            </button>


                                        </div>

                                    </div>

                            </form>

                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>

                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                         <p>{{ $product->description }}</p>

                                    </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">

                                    @forelse($product->reviews as $review)

                                        <div class="mb-4 border-bottom pb-3">
                                            <div class="d-flex">


                                                <div class="ms-3 w-100">

                                                    <p class="mb-1 text-muted" style="font-size: 13px;">
                                                        {{ $review->date_time ? \Carbon\Carbon::parse($review->date_time)->format('M d, Y h:i A') : $review->created_at->format('M d, Y') }}
                                                    </p>

                                                    <div class="d-flex justify-content-between align-items-center">

                                                        <div>
                                                            <h5 class="mb-0 fw-bold">{{ $review->user->name }}</h5>
                                                            @if($review->title)
                                                                <h6 class="text-secondary my-1 fw-semibold" style="font-size: 14px;">{{ $review->title }}</h6>
                                                            @endif
                                                        </div>


                                                        <div class="d-flex" style="font-size: 13px;">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= $review->rating)
                                                                    <i class="fa fa-star text-warning"></i> <!-- সোনালী স্টার -->
                                                                @else
                                                                    <i class="fa fa-star text-muted"></i> <!-- ধূসর স্টার -->
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>


                                                    <p class="text-dark mb-0 mt-1">{{ $review->body }}</p>
                                                </div>
                                            </div>


                                            @if($review->reply)
                                                <div class="d-flex mt-3 ms-5 p-3 bg-light rounded-3 border-start border-primary border-3">

                                                    <div class="me-2 text-primary">
                                                        <i class="fa fa-reply"></i>
                                                    </div>
                                                    <div>
                                                        <strong class="text-primary d-block mb-1" style="font-size: 14px;">Admin Reply:</strong>
                                                        <p class="text-muted mb-0" style="font-size: 14px;">{{ $review->reply }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @empty

                                        <div class="alert alert-light text-center py-4">
                                            <p class="mb-0 text-muted">No reviews yet. Be the first to leave a reply!</p>
                                        </div>
                                    @endforelse

                                </div>


                                    {{-- <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div> --}}
                                </div>
                            </div>


                            <form action="{{ route('review.store', $product->id) }}" method="POST">
                                @csrf

                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">

                                   <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" id="nameInput" class="form-control border border-secondary-subtle" placeholder="Your Name" required>
                                            <label for="nameInput">Your Name <span class="text-danger">*</span></label>
                                        </div>
                                    </div>


                                   <div class="col-lg-6 mb-3">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="emailInput" class="form-control border border-secondary-subtle" placeholder="Your Email" required>
                                        <label for="emailInput">Your Email <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="body" id="bodyInput" class="form-control border border-secondary-subtle" style="height: 200px;" placeholder="Your Review" spellcheck="false" required></textarea>
                                        <label for="bodyInput">Your Review <span class="text-danger">*</span></label>
                                    </div>
                                </div>


                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between align-items-center py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>


                                                <div class="d-flex align-items-center gap-1 star-rating" style="font-size: 16px; cursor: pointer;">
                                                    <i class="fa fa-star text-warning" data-value="1"></i>
                                                    <i class="fa fa-star text-warning" data-value="2"></i>
                                                    <i class="fa fa-star text-warning" data-value="3"></i>
                                                    <i class="fa fa-star text-muted" data-value="4"></i>
                                                    <i class="fa fa-star text-muted" data-value="5"></i>
                                                </div>


                                                <input type="hidden" name="rating" id="rating-value" value="3">
                                            </div>

                                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 shadow-sm">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                                <div class="mb-4">
                                    <h4>Categories</h4>

                                    <ul class="list-unstyled fruite-categorie">

                                        @foreach($categories as $category)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">

                                                    <a href="#">
                                                        <i class="fas fa-apple-alt me-2"></i>
                                                        {{ $category->title }}
                                                    </a>

                                                    <span>
                                                        <span>({{ $category->products->count() }})</span>
                                                    </span>

                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="mb-4">Featured products</h4>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded" style="width: 100px; height: 100px;">
                                        <img src="{{ asset('frontend/assets/img/featur-1.jpg') }}" class="img-fluid rounded" alt="Image">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Big Banana</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded" style="width: 100px; height: 100px;">
                                        <img src="{{ asset('frontend/assets/img/featur-2.jpg') }}" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">Big Banana</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">2.99 $</h5>
                                            <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center my-4">
                                    <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{ asset('frontend/assets/img/banner-fruits.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <h1 class="fw-bold mb-0">Related products</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Parsely</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Parsely</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Banana</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Bell Papper</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Potatoes</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Parsely</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Potatoes</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>Parsely</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


<script>
    document.querySelectorAll('.star-rating .fa-star').forEach(star => {
        star.addEventListener('click', function() {
            let value = this.getAttribute('data-value');
            document.getElementById('rating-value').value = value;

            // সব স্টারের কালার রিসেট করে ক্লিক করা স্টার পর্যন্ত কালার করার লজিক
            document.querySelectorAll('.star-rating .fa-star').forEach(s => {
                if(s.getAttribute('data-value') <= value) {
                    s.classList.remove('text-muted');
                    s.classList.add('text-warning');
                } else {
                    s.classList.remove('text-warning');
                    s.classList.add('text-muted');
                }
            });
        });
    });
</script>

@endsection
