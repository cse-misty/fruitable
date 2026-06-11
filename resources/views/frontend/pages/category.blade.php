@extends('frontend.layouts')
@section('content')
  <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Category</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Category</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <div class="container py-4">
           <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3 p-5">

            <h3 class="section-title mb-0">All Category</h3>

            <!-- SEARCH -->
        <div class="category-search">
    <input type="text" id="categorySearch" placeholder="Search category...">
    <i class="fas fa-search"></i>
</div>

        </div>

            <!-- GRID -->
            <div class="row g-4 text-center">

                   @foreach ($categories as $category)

                    <div class="col-6 col-md-3 category-item">
                        {{-- <img src="{{asset($category->image)}}" class="img-fluid" alt=""> --}}
                             <img src="{{ asset('storage/' . $category->image) }}"
                                class="img-fluid category-img"
                                alt="{{ $category->title }}">
                                <div class="py-3">
                                    <a href="#" class="category-title">{{ $category->title }}</a>
                                </div>
                        </div>
                    @endforeach

                {{-- <div class="col-6 col-md-3 category-item">
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
              </div> <!-- row end -->

            <div class="d-flex justify-content-end mt-5">
                <nav>
                    {{ $categories->links() }}
                </nav>
            </div>

            </div>
        </div>


@endsection
