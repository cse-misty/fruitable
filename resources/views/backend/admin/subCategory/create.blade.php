@extends('backend.dashboard')

@section('content')

<div class="container mt-4">

    <form action="{{ route('sub-category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

     <div class="card p-4">
    <div class="border-bottom pb-2 mb-3">
        <h4>{{ __('Create New Sub Category') }}</h4>
    </div>

    <!-- Row শুরু -->
    <div class="row">

       
        <div class="col-md-8">

            {{-- CATEGORY --}}
            <div class="mb-3">
                <label class="form-label">
                    {{ __('Select Category') }} <span class="text-danger">*</span>
                </label>
                <select name="category_id" class="form-control select2">
                    <option value="" disabled selected>
                        {{ __('Select Category') }}
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- টাইটেল এবং স্লাগ পাশাপাশি ২ কলামে দেখানোর জন্য আরেকটি সাব-রো -->
            <div class="row">
                {{-- TITLE --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           placeholder="Title">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- SLUG --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text"
                           name="slug"
                           class="form-control"
                           value="{{ old('slug') }}"
                           placeholder="slug-example">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row">
                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 0 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label">Priority</label>
                    <input type="number"
                           name="priority"
                           class="form-control"
                           value="{{ old('priority', 0) }}"
                           placeholder="0">
                    @error('priority')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file"
                       name="image"
                       class="form-control"
                       onchange="previewImage(event)">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>


        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center border-start text-center mb-3">
            <label class="form-label d-block mb-2 fw-bold">Image Preview</label>
            <div class="border p-2 rounded bg-light">
                <img id="previewProfile"
                     src="https://placehold.co/500x500/f1f5f9/png"
                     class="img-fluid rounded"
                     style="max-width: 100%; max-height: 220px; object-fit: cover;">
            </div>
        </div>

    </div>
    <!-- Row শেষ -->


    <div class="d-flex justify-content-between border-top pt-3 mt-2">
        <a href="{{ route('sub-category.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> {{ __('Back') }}
        </a>
        <button type="submit" class="btn btn-primary px-4">
            {{ __('Submit') }} <i class="fas fa-paper-plane ms-1"></i>
        </button>
    </div>
</div>


    </form>

</div>

{{-- IMAGE PREVIEW SCRIPT --}}
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('previewProfile').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
