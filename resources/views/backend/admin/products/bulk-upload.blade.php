@extends('backend.dashboard')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold">Bulk Product Upload</h5>
        </div>
        <div class="card-body p-4">

            @if($errors->any())
                <div class="alert alert-danger py-2 small">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('products.bulk-upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold">Upload Excel/CSV File</label>
                    <input type="file" name="excel_file" class="form-control" required>
                    <small class="text-muted d-block mt-2">
                        Supported formats: .xlsx, .xls, .csv.
                    </small>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- ডেভেলপার বা অ্যাডমিনের ডাউনলোডের জন্য একটি স্যাম্পল ফাইল লিংক রাখা ভালো -->
                    <a href="#" class="text-decoration-none small text-primary fw-bold">
                        <i class="fas fa-download me-1"></i> Download Sample Template
                    </a>
                    <button type="submit" class="btn btn-success px-4 rounded-pill">Import Products</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
