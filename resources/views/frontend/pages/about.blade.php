@extends('frontend.layouts')
@section('content')

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">About Us</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">About us</li>
    </ol>
</div>


    <!-- Main About Section -->
    <div class="container mt-5">
        <div class="row align-items-center g-5">
            <!-- Left Side: Interactive Images -->
          <div class="col-lg-6">
                <div class="position-relative p-3 text-center text-lg-start">
                    <!-- -->
                    <div class="about-img-wrapper position-relative d-inline-block">
                        <img src="{{ $about->image ? asset('uploads/about/' . $about->image) : 'https://placehold.co' }}"
                            class="img-fluid shadow"
                            alt="About Our Fresh Vegetables"
                            style="object-fit: cover; width: 100%; max-width: 450px; height: 380px; border-radius: 30px; border: 8px solid #ffffff;">

                        <!-- (Positioned Box) -->
                        <div class="position-absolute bg-primary text-white p-3 rounded shadow d-none d-sm-block text-center"
                            style="bottom: 20px; right: -20px; min-width: 180px; border-radius: 15px !important;">
                            <h3 class="mb-0 font-weight-bold" style="font-size: 2.2rem; line-height: 1;">{{ $about->experience_year }}</h3>
                            <p class="small mb-0 text-uppercase letter-spacing-1" style="font-size: 11px; font-weight: 600;">
                                {{ __($about->experience_text) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Right Side: Content -->
            <div class="col-lg-6">
                <span class="text-uppercase text-primary font-weight-bold letter-spacing-1 d-block mb-2">{{ $about->sub_title }}</span>
                <h2 class="mb-4 text-dark font-weight-bold">{{ __($about->title) }}</h2>
               <div class="text-muted mb-4 lead">
                    {!! $about->description_top !!}
                </div>

                <div class="text-muted mb-4">
                    {!! $about->description_bottom !!}
                </div>
                <!-- Key Features / Core Competencies -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary-subtle text-primary rounded-circle p-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class=" {{ $about->feature_one_icon  }} fs-5"></i>
                            </div>
                            <h6 class="mb-0 text-dark font-weight-bold">{{ __('Certified Experts') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary-subtle text-primary rounded-circle p-3 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class=" {{ $about->feature_one_icon  }} fs-5"></i>
                            </div>
                            <h6 class="mb-0 text-dark font-weight-bold">{{ __('24/7 Premium Support') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision, Mission & Values Tabs Section -->
    <div class="bg-light py-5">
        <div class="container py-3">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <h2 class="font-weight-bold text-dark">{{ __($about->about_title) }}</h2>
                    <p class="text-muted">{{ __($about->about_name) }}</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-pills justify-content-center mb-4 shadow-sm rounded-pill bg-white p-2" id="aboutTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill px-4 py-2" id="mission-tab" data-bs-toggle="pill" data-bs-target="#mission" type="button" role="tab">{{ __($about->mission_title) }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-4 py-2" id="vision-tab" data-bs-toggle="pill" data-bs-target="#vision" type="button" role="tab">{{ __($about->vision_title) }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-4 py-2" id="values-tab" data-bs-toggle="pill" data-bs-target="#values" type="button" role="tab">{{ __($about->core_value_title) }}</button>
                        </li>
                    </ul>

                    <!-- Tab Contents -->
                    <div class="tab-content bg-white p-4 rounded shadow-sm" id="aboutTabContent">
                        <div class="tab-pane fade show active" id="mission" role="tabpanel">
                            <h4 class="text-dark font-weight-bold mb-3"><i class="fas fa-bullseye text-primary me-2"></i> {{ __($about->mission_title) }}</h4>
                            <p class="text-muted mb-0">{{ __($about->mission_description) }}</p>
                        </div>
                        <div class="tab-pane fade" id="vision" role="tabpanel">
                            <h4 class="text-dark font-weight-bold mb-3"><i class="fas fa-eye text-primary me-2"></i> {{ __($about->vision_title) }}</h4>
                            <p class="text-muted mb-0">{{ __($about->vission_description) }}</p>
                        </div>
                        <div class="tab-pane fade" id="values" role="tabpanel">
                            <h4 class="text-dark font-weight-bold mb-3"><i class="fas fa-handshake text-primary me-2"></i> {{ __($about->core_value_title) }}</h4>
                            <p class="text-muted mb-0">{{ __($about->core_value_description) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

