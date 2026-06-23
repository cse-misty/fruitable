@extends('backend.dashboard')

@section('content')

<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h5 class="card-title mb-0 text-dark font-weight-bold">
                     {{ __('Update Sub Category Information') }}
                </h5>
                <!-- Back Button -->
                <a href="{{ route('sub-category.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm font-weight-bold">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>

            <!-- FORM -->
            <form action="{{ route('sub-category.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

             <!-- Parent Category Selection -->
                <div class="col-md-3 mb-4">
                    <label class="form-label font-weight-bold text-dark">
                        {{ __('Select Category') }} <span class="text-danger">*</span>
                    </label>

                    <select name="category_id"
                            class="form-select select2 @error('category_id') is-invalid @enderror"
                            required
                            style="width: 100%">
                        <option value="" disabled {{ old('category_id', $subCategory->category_id) ? '' : 'selected' }}>
                            {{ __('Select Category') }}
                        </option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $subCategory->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->title ?? $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                    <!-- Title -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               name="title"
                               value="{{ old('title', $subCategory->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter sub category title"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                   
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Slug <span class="text-danger">*</span></label>
                        <input type="text"
                               name="slug"
                               value="{{ old('slug', $subCategory->slug) }}"
                               class="form-control @error('slug') is-invalid @enderror"
                               placeholder="slug-example"
                               required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Priority -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Priority</label>
                        <input type="number"
                               name="priority"
                               value="{{ old('priority', $subCategory->priority ?? 0) }}"
                               class="form-control @error('priority') is-invalid @enderror"
                               min="0">
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Status</label>
                        <select name="status" class="form-select form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status', $subCategory->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $subCategory->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image with Live Preview -->
                    <div class="col-md-9 mb-3">
                        <label class="form-label font-weight-bold text-dark">Sub Category Image</label>
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
                            @if($subCategory->image)
                                <img id="imagePreview" src="{{ asset('uploads/subcategory/'.$subCategory->image) }}" alt="Preview" class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                            @else
                                <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 120px; object-fit: cover;">
                            @endif
                        </div>
                    </div>

                </div>

                <!-- Submit Button Area -->
                <div class="text-end border-top pt-4 mt-3">
                    <!-- Reset Button -->
                    <button type="button"
                            class="btn btn-danger rounded-pill px-5 py-2 me-2 shadow-sm text-white font-weight-bold"
                            onclick="resetForm(button)">
                        <i class="fas fa-undo me-2"></i> Reset
                    </button>

                    <!-- Update Button -->
                    <button type="submit"
                            class="btn btn-warning text-dark rounded-pill px-5 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-sync-alt me-2"></i> Update Sub Category
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('categoryImage').onchange = function (evt) {
        const [file] = this.files;
        const preview = document.getElementById('imagePreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        }
    }

    function resetForm(button) {
        const form = button.closest('form');
        form.reset();

        const preview = document.getElementById('imagePreview');
        @if($subCategory->image)
            preview.src = "{{ asset('uploads/subcategory/'.$subCategory->image) }}";
            preview.classList.remove('d-none');
        @else
            preview.src = "#";
            preview.classList.add('d-none');
        @endif
    }
</script>

@endsection
