@extends('backend.dashboard')

@section('content')

{{-- <div class="d-flex align-items-center justify-content-between px-3 mb-3">
    <h4 class="mb-0 text-dark font-weight-bold">{{ __('Edit Category') }}</h4>
</div> --}}

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h5 class="card-title mb-0 text-dark font-weight-bold">
                     {{ __('Update Category Information') }}
                </h5>
                <!-- Back Button -->
                <a href="{{ route('categories.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm font-weight-bold">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>

            <!-- FORM -->
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Title -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               name="title"
                               value="{{ old('title', $category->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter category title"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Priority -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Priority</label>
                        <input type="number"
                               name="priority"
                               value="{{ old('priority', $category->priority ?? 0) }}"
                               class="form-control @error('priority') is-invalid @enderror"
                               min="0">
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image with Live Preview -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">Category Image</label>
                        <input type="file"
                               name="image"
                               id="categoryImage"
                               class="form-control @error('image') is-invalid @enderror"
                               accept="image/*">
                        <small class="text-dark font-weight-bold d-block mt-1">Leave blank if you don't want to change the image.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Image Preview Box -->
                        <div class="mt-3">
                            <label class="form-label d-block text-dark font-weight-bold small">Image Preview:</label>
                            @if($category->image)
                                <img id="imagePreview" src="{{ asset('storage/'.$category->image) }}" alt="Preview" class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                            @else
                                <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 120px; object-fit: cover;">
                            @endif
                        </div>
                    </div>



                    <!-- Description -->
                    <div class="col-md-9 mb-4">
                        <label class="form-label font-weight-bold text-dark">Description</label>
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Enter category description">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                       <!-- Status -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Status</label>
                        <select name="status" class="form-select form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Submit Button Area -->
                <div class="text-end border-top pt-4 mt-3">
                    <!-- Reset Button -->
                    <button type="button"
                            class="btn btn-danger rounded-pill px-5 py-2 me-2 shadow-sm text-white font-weight-bold"
                            onclick="resetForm(this)">
                        <i class="fas fa-undo me-2"></i> Reset
                    </button>

                    <!-- Update Button -->
                    <button type="submit"
                            class="btn btn-warning text-dark rounded-pill px-5 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-sync-alt me-2"></i> Update Category
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<!-- ইমেজ লাইভ প্রিভিউ এবং কাস্টম রিসেট স্ক্রিপ্ট -->
<script>
    // নতুন ছবি সিলেক্ট করলে প্রিভিউ চেঞ্জ হবে
    document.getElementById('categoryImage').onchange = function (evt) {
        const [file] = this.files;
        const preview = document.getElementById('imagePreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        }
    }

    // রিসেট বাটনে ক্লিক করলে ডাটাবেজের অরিজিনাল ডাটা ফেরত আসবে
    function resetForm(button) {
        const form = button.closest('form');
        form.reset();

        // জাভাস্ক্রিপ্ট রিসেটের পর ডাটাবেজ থেকে আসা ছবির অরিজিনাল প্রিভিউ ফেরত আনা
        const preview = document.getElementById('imagePreview');
        @if($category->image)
            preview.src = "{{ asset('storage/'.$category->image) }}";
            preview.classList.remove('d-none');
        @else
            preview.src = "#";
            preview.classList.add('d-none');
        @endif
    }
</script>

@endsection
