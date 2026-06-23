@extends('backend.dashboard')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 font-weight-bold">
                         Create New Dynamic Page
                    </h5>
                    <a href="{{ route('pages.index') }}" class="btn btn-light btn-sm text-black font-weight-bold shadow-sm">
                         Back to Page List
                    </a>
                </div>


                <div class="card-body p-4 p-md-5 bg-white">


                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf


                        <div class="mb-4">
                            <label class="form-label text-dark font-weight-bold">Page Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="e.g., Privacy Policy" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="form-label text-dark font-weight-bold">Page Slug (URL) <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="e.g., privacy-policy" value="{{ old('slug') }}" required>
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-info-circle me-1"></i> স্পেস না দিয়ে ছোট হাতের অক্ষরে হাইফেন (-) ব্যবহার করবেন। যেমন: <code>terms-conditions</code>
                            </small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="form-label text-dark font-weight-bold">Page Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Write your full page policy or terms content here..." required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm font-weight-bold">
                                 Save & Publish Page
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
