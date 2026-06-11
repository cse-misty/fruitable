@extends('backend.dashboard')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h4 class="mb-0 text-dark font-weight-bold">Create FAQ Category</h4>

            <a href="{{ route('faq.catagory.index') }}"
               class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('faq.catagory.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <!-- Name -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label fw-bold">
                        Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter category name">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label fw-bold">
                        Slug <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="slug"
                           value="{{ old('slug') }}"
                           class="form-control @error('slug') is-invalid @enderror"
                           placeholder="Enter category slug">

                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label fw-bold">
                        Status
                    </label>

                    <select name="status"
                            class="form-control @error('status') is-invalid @enderror">

                        <option value="1"
                            {{ old('status',1) == 0 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status') == 1 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <!-- Buttons -->
            <div class="text-end border-top pt-4 mt-3">

                <button type="reset"
                        class="btn btn-danger rounded-pill px-5 py-2 me-2">
                    <i class="fas fa-undo me-2"></i> Reset
                </button>

                <button type="submit"
                        class="btn btn-success rounded-pill px-5 py-2">
                    <i class="fas fa-save me-2"></i> Save Category
                </button>

            </div>

        </form>

    </div>
</div>

@endsection
