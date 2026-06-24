@extends('backend.dashboard')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h5 class="card-title mb-0 text-dark fw-bold">
                <i class="fas fa-edit text-warning me-1"></i>
                {{ __('Update Product Information') }}
            </h5>

            <a href="{{ route('products.index') }}"
               class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">
                        Name <span class="text-danger"></span>
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $product->name) }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter product name"
                           required>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category (NEW) -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">Category</label>

                    <select name="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">

                        <option value="">Select Category</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                 <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">Sub Category</label>


                    <select name="sub_category_id"
                            class="form-control @error('sub_category_id') is-invalid @enderror">

                        <option value="">Select Sub Category</option>


                        @foreach($subCategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ old('sub_category_id', $product->sub_category_id) == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->title }}
                            </option>
                        @endforeach

                    </select>

                    @error('sub_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Rating (0 - 5)</label>
                    <input type="number"
                        name="rating"
                        value="{{ old('rating', isset($product) ? $product->rating : 5) }}"
                        class="form-control"
                        step="0.1"
                        min="0"
                        max="5"
                        placeholder="Enter rating e.g. 4.5">
                </div>



                <!-- Priority -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">Priority</label>

                    <input type="number"
                           name="priority"
                           value="{{ old('priority', $product->priority ?? 0) }}"
                           class="form-control @error('priority') is-invalid @enderror"
                           min="0">

                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">Product Image</label>

                    <input type="file"
                           name="image"
                           id="productImage"
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/*">

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Preview -->
                    <div class="mt-3">
                        <label class="form-label d-block fw-bold small text-dark">Image Preview:</label>

                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 class="img-thumbnail"
                                 style="max-height:120px;">
                        @else
                            <img class="img-thumbnail d-none" style="max-height:120px;">
                        @endif
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-dark">Status</label>

                    <select name="status"
                            class="form-control @error('status') is-invalid @enderror">

                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold text-dark">Description</label>

                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="4"
                              placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Buttons -->
            <div class="text-end border-top pt-4 mt-3">

                <button type="reset"
                        class="btn btn-danger rounded-pill px-5 py-2 me-2 shadow-sm fw-bold">
                    <i class="fas fa-undo me-2"></i> Reset
                </button>

                <button type="submit"
                        class="btn btn-warning text-dark rounded-pill px-5 py-2 shadow-sm fw-bold">
                    <i class="fas fa-sync-alt me-2"></i> Update Product
                </button>

            </div>

        </form>

    </div>
</div>

@endsection
