@extends('backend.dashboard')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">

            <h4 class="mb-0 text-dark font-weight-bold">Create FAQ</h4>

            <a href="{{ route('faq.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>

        </div>

        <!-- FORM -->
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf

            <div class="row">

                <!-- Question -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Question <span class="text-danger">*</span></label>

                    <input type="text"
                           name="question"
                           value="{{ old('question') }}"
                           class="form-control @error('question') is-invalid @enderror"
                           required>

                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Answer -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Answer <span class="text-danger">*</span></label>

                    <textarea name="answer"
                              rows="3"
                              class="form-control @error('answer') is-invalid @enderror"
                              required>{{ old('answer') }}</textarea>

                    @error('answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Category <span class="text-danger">*</span></label>

                    <select name="faq_category_id"
                            class="form-control @error('faq_category_id') is-invalid @enderror"
                            required>

                        <option value="">Select Category</option>

                        @foreach($faqCategories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('faq_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3 px-5">
                    <label class="form-label font-weight-bold">Status</label>

                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 0 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <!-- Buttons -->
            <div class="text-end border-top pt-4 mt-3">

                <button type="reset" class="btn btn-danger rounded-pill px-5 py-2 me-2 shadow-sm">
                    Reset
                </button>

                <button type="submit" class="btn btn-success rounded-pill px-5 py-2 shadow-sm">
                    Create FAQ
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
