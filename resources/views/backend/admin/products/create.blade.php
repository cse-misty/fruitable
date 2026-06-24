@extends('backend.dashboard')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h4 class="mb-0 text-dark font-weight-bold">Create Product</h4>

            <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <!-- Product Name -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Product Name  <span class="text-danger">*</span></label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter product name"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Category  <span class="text-danger">*</span></label>
                    <select name="category_id"
                            class="form-control @error('category_id') is-invalid @enderror"
                            required>
                        <option value="" text-dark bg-white>Select Category</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                   <!-- Category -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Sub Category <span class="text-danger">*</span></label>
                    <select name="sub_category_id"
                            class="form-control @error('sub_category_id') is-invalid @enderror"
                            required>
                        <option value="">Select Sub Category</option>

                        @foreach($subCategories as $subCategorie)
                            <option value="{{ $subCategorie->id }}"
                                {{ old('sub_category_id') == $subCategorie->id ? 'selected' : '' }}>
                                {{ $subCategorie->title }}
                            </option>
                        @endforeach

                    </select>

                    @error('sub_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- rating -->
               <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Rating (0 - 5)</label>
                    <input type="number"
                        name="rating" {{-- priority পরিবর্তন করে rating করা হলো --}}
                        value="{{ old('rating', $product->rating ?? 5) }}" {{-- ডিফল্ট ভ্যালু ৫ বা ডাটাবেজের মান দেখাবে --}}
                        class="form-control"
                        step="0.1" {{-- ৪.৫ বা ৪.২ এর মতো দশমিক ইনপুট দেওয়ার জন্য --}}
                        min="0"
                        max="5" {{-- ৫ এর বেশি রেটিং দেওয়া যাবে না --}}
                        placeholder="Enter rating e.g. 4.5">
                </div>



                <!-- Priority -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Priority</label>
                    <input type="number"
                           name="priority"
                           value="{{ old('priority', 0) }}"
                           class="form-control">
                </div>

                <!-- Price -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Price</label>
                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ old('price') }}"
                           class="form-control"
                           placeholder="Enter price">
                </div>

                <!-- Image -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Product Image  <span class="text-danger">*</span></label>
                    <input type="file"
                           name="image"
                           id="productImage"
                           class="form-control"
                           accept="image/*"
                           required>

                    <div class="mt-3">
                        <img id="imagePreview" class="img-thumbnail d-none" style="max-height:120px;">
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status',1)==0?'selected':'' }}>Active</option>
                        <option value="0" {{ old('status')==1?'selected':'' }}>Inactive</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-4 px-5">
                    <label class="form-label font-weight-bold">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              placeholder="Enter product description">{{ old('description') }}</textarea>
                </div>

            </div>

            <!-- Buttons -->
            <div class="text-end border-top pt-4 mt-3">

                <button type="reset"
                        class="btn btn-danger rounded-pill px-5 py-2 me-2">
                    Reset
                </button>

                <button type="submit"
                        class="btn btn-success rounded-pill px-5 py-2">
                    Create Product
                </button>

            </div>

        </form>

    </div>
</div>

<script>
document.getElementById('productImage').addEventListener('change', function (e) {
    const reader = new FileReader();

    reader.onload = function () {
        const img = document.getElementById('imagePreview');
        img.src = reader.result;
        img.classList.remove('d-none');
    }

    reader.readAsDataURL(e.target.files[0]);
});
</script>

@endsection
