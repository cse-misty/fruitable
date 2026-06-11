@extends('backend.dashboard')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 mb-3">
    <h4 class="mb-0 text-dark font-weight-bold">{{ __('Edit Category') }}</h4>
</div>

<div class="container">

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h5 class="card-title mb-0 text-dark font-weight-bold">
                    <i class="fas fa-edit text-warning me-1"></i> {{ __('Update Category Information') }}
                </h5>
                <!-- Back Button -->
                <a href="{{ route('faq.catagory.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm font-weight-bold">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>

            <!-- FORM -->
            <form action="{{ route('faq.catagory.update', $faqCatagory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $faqCatagory->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter category name"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Image with Live Preview -->


                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">Status</label>
                        <select name="status" class="form-select form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status', $faqCatagory->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $faqCatagory->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->

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
        @if($faqCatagory->image)
            preview.src = "{{ asset('storage/'.$faqCatagory->image) }}";
            preview.classList.remove('d-none');
        @else
            preview.src = "#";
            preview.classList.add('d-none');
        @endif
    }
</script>

@endsection
