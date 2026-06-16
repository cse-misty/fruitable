@extends('backend.dashboard')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 mb-3">
    <h4 class="mb-0">{{ __('Hero Slider List') }}</h4>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">



            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 70px;">SL</th>
                            <th class="text-center" style="width: 100px;">Image</th>
                            <th>Sub Title</th>
                            <th>Main Title</th>
                            <th>Badge Text</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($heroSliders as $key => $heroSlider)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>

                           <td class="text-center">

                                @php
                                    $images = $heroSlider->image;

                                    if (is_string($images)) {
                                        $images = json_decode($images, true);
                                    }

                                    $images = is_array($images) ? $images : [];
                                @endphp

                                @if(!empty($images))
                                    <div class="d-flex flex-wrap gap-1 justify-content-center">

                                        @foreach($images as $img)
                                            <img
                                                src="{{ asset('storage/' . $img) }}"
                                                width="45"
                                                height="40"
                                                style="object-fit:cover;border-radius:4px;"
                                                {{-- onerror="this.src='{{ asset('frontend/assets/img/hero-img-1.png') }}'"> --}}
                                        @endforeach

                                    </div>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif

                            </td>

                                <td>{{ $heroSlider->sub_title }}</td>
                                <td><strong>{{ $heroSlider->main_title }}</strong></td>
                                <td><span class="badge bg-info text-dark">{{ $heroSlider->badge_text }}</span></td>

                                <td class="text-center">

                                    <a href="{{ route('hero.slider.edit', $heroSlider->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    {{ __('No Data Found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
