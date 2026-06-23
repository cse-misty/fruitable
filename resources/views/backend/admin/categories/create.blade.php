@extends('backend.dashboard')
@section('content')


<div class="container-fluid">


    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
               <h4 class="mb-0 text-dark font-weight-bold"> Add Category</h4>
                <!-- Back Button -->
              <a href="{{ route('categories.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>

            </div>

            <!-- FORM -->
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- Title -->
                    <div class="col-md-6 mb-3 px-5">
                        <label class="form-label font-weight-bold text-dark">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter category title"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Priority -->
                    <div class="col-md-6 mb-3 px-5">
                        <label class="form-label font-weight-bold text-dark">Priority</label>
                        <input type="number"
                               name="priority"
                               value="{{ old('priority', 0) }}"
                               class="form-control @error('priority') is-invalid @enderror"
                               min="0">
                        @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image with Live Preview -->
                    <div class="col-md-6 mb-3 px-5">
                        <label class="form-label font-weight-bold text-dark">Category Image <span class="text-danger">*</span></label>
                        <input type="file"
                               name="image"
                               id="categoryImage"
                               class="form-control @error('image') is-invalid @enderror"
                               accept="image/*"
                               required>
                        <small class="text-dark ">Thumbnail will be automatically generated.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Box -->
                        <div class="mt-3">
                            <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 120px; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3 px-5">
                        <label class="form-label font-weight-bold text-dark">Status</label>
                        <select name="status" class="form-select form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-4 px-5">
                        <label class="form-label font-weight-bold text-dark">Description</label>
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Enter category description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="text-end border-top pt-4 mt-3">

                    <button type="button"
                            class="btn btn-danger rounded-pill px-5 py-2 me-2 shadow-sm text-white font-weight-bold"
                            onclick="resetForm(this)">
                        <i class="fas fa-undo me-2"></i> Reset
                    </button>


                    <button type="submit"
                            class="btn btn-success rounded-pill px-5 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-save me-2"></i> Create Category
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
        } else {
            preview.classList.add('d-none');
        }
    }


    function resetForm(button) {

    const form = button.closest('form');

    form.reset();

    form.querySelectorAll('input[type="text"], input[type="number"], textarea').forEach(input => {
        if(input.name === 'priority') {
            input.value = '0';
        } else {
            input.value = '';
        }
    });

    const preview = document.getElementById('imagePreview');
    if(preview) {
        preview.src = '#';
        preview.classList.add('d-none');
    }
}
</script>


@endsection
