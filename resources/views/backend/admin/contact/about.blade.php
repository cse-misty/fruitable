@extends('backend.dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h5 class="card-title mb-0 text-dark font-weight-bold">
                    <i class="fas fa-edit me-2 text-primary"></i> {{ __('Update About Us Information') }}
                </h5>
            </div>

            <form action="{{ route('about.us.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- SECTION 1: MAIN HERO & CONTENT -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-black font-weight-bold mb-3 border-bottom pb-1"> Main Content & Titles</h6>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">Sub Title <span class="text-danger">*</span></label>
                        <input type="text" name="sub_title" value="{{ old('sub_title', $about->sub_title ?? 'Who We Are') }}" class="form-control @error('sub_title') is-invalid @enderror" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">Main Title</label>
                        <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" class="form-control" placeholder="Enter main heading title">
                    </div>


                      <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">Certified Experts <span class="text-danger">*</span></label>
                        <input type="text" name="feature_one_title" value="{{ old('feature_one_title', $about->feature_one_title ?? 'Who We Are') }}" class="form-control @error('sub_title') is-invalid @enderror" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">24/7 Premium Support</label>
                        <input type="text" name="feature_two_title" value="{{ old('feature_two_title', $about->feature_two_title ?? '') }}" class="form-control" placeholder="Enter main heading title">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">Icon One</label>
                        <input type="text" name="feature_one_icon" value="{{ old('feature_one_icon', $about->feature_one_icon ?? 'Who We Are') }}" class="form-control @error('sub_title') is-invalid @enderror" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-dark">Icon Two/label>
                        <input type="text" name="feature_two_icon" value="{{ old('feature_two_icon', $about->feature_two_icon ?? '') }}" class="form-control" placeholder="Enter main heading title">
                    </div>




                    <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">
                            Top Description (Paragraph 1)
                        </label>

                        <textarea
                            name="description_top"
                            id="description_top"
                            rows="4"
                            class="form-control editor"
                            placeholder="Enter first paragraph text..."
                        >{{ old('description_top', $about->description_top ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">
                            Bottom Description (Paragraph 2)
                        </label>

                        <textarea
                            name="description_bottom"
                            id="description_bottom"
                            rows="4"
                            class="form-control editor"
                            placeholder="Enter second paragraph text..."
                        >{{ old('description_bottom', $about->description_bottom ?? '') }}</textarea>
                    </div>

                </div>

                <!-- SECTION 2: EXPERIENCE & IMAGE -->
                <div class="row mb-4 bg-light p-3 rounded">
                    <div class="col-12">
                        <h6 class="text-black font-weight-bold mb-3 border-bottom pb-1"> Experience Badge & Image</h6>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Experience Year Badge</label>
                        <input type="text" name="experience_year" value="{{ old('experience_year', $about->experience_year ?? '10+') }}" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label font-weight-bold text-dark">Experience Text</label>
                        <input type="text" name="experience_text" value="{{ old('experience_text', $about->experience_text ?? 'Years of Freshness') }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">Status</label>
                        <select name="status" class="form-select form-control">
                            <option value="1" {{ old('status', $about->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $about->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label font-weight-bold text-dark">About Image</label>
                        <input type="file" name="image" id="aboutImageInput" class="form-control" accept="image/*">
                    </div>

                    <div class="col-md-4 mb-3 text-center">
                        <label class="form-label d-block text-dark font-weight-bold small">Live Image Preview:</label>
                        <div class="border p-2 bg-white rounded d-inline-block">
                            @if(isset($about) && $about->image && file_exists(public_path('uploads/about/'.$about->image)))
                                <img id="aboutImagePreview" src="{{ asset('uploads/about/'.$about->image) }}" alt="Preview" class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                            @else

                                <img id="aboutImagePreview" src="https://placehold.co" alt="Preview" class="img-thumbnail" style="max-height: 120px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: STRATEGIC ROADMAP -->
                <div class="row mb-4 ">

                    <div class="col-12 p-3">
                        <h6 class="text-black font-weight-bold mb-3 border-bottom pb-1"><i class="fas fa-bullseye me-2"></i> Strategic Roadmap (Mission, Vision & Core Values)</h6>
                    </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark">Our Strategic Roadmap</label>
                        <input type="text" name="about_title" value="{{ old('about_title', $about->about_title ?? 'Who We Are') }}" class="form-control @error('sub_title') is-invalid @enderror" required>
                    </div>
                       <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold text-dark"> Strategic Roadmap Description</label>
                        <input type="text" name="about_name" value="{{ old('about_name', $about->about_name ?? 'Who We Are') }}" class="form-control @error('sub_title') is-invalid @enderror" required>
                    </div>




                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded h-100 border">
                            <label class="form-label font-weight-bold text-success"><i class="fas fa-crosshairs me-1"></i> Mission Title</label>
                            <input type="text" name="mission_title" value="{{ old('mission_title', $about->mission_title ?? '') }}" class="form-control mb-3" placeholder="e.g., Our Mission">
                            <label class="form-label font-weight-bold text-dark">Mission Description</label>
                            <textarea name="mission_description" rows="5" class="form-control">{{ old('mission_description', $about->mission_description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded h-100 border">
                            <label class="form-label font-weight-bold text-info"><i class="fas fa-eye me-1"></i> Vision Title</label>
                            <input type="text" name="vision_title" value="{{ old('vision_title', $about->vision_title ?? '') }}" class="form-control mb-3" placeholder="e.g., Our Vision">
                            <label class="form-label font-weight-bold text-dark">Vision Description</label>
                            <textarea name="vission_description" rows="5" class="form-control">{{ old('vission_description', $about->vission_description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded h-100 border">
                            <label class="form-label font-weight-bold text-warning"><i class="fas fa-handshake me-1"></i> Core Value Title</label>
                            <input type="text" name="core_value_title" value="{{ old('core_value_title', $about->core_value_title ?? '') }}" class="form-control mb-3" placeholder="e.g., Core Values">
                            <label class="form-label font-weight-bold text-dark">Core Value Description</label>
                            <textarea name="core_value_description" rows="5" class="form-control">{{ old('core_value_description', $about->core_value_description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- <div class="text-end border-top pt-4 mt-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-save me-2"></i> {{ __('Save & Update About Information') }}
                    </button>
                </div> --}}

                     <div style="position: sticky; bottom: 20px; text-align: right; margin-top: 20px; z-index: 1050; pointer-events: none;">
                    <button type="submit" class="btn btn-primary px-4 m-3" style="font-size: 15px; font-weight: 400; box-shadow: 0px 4px 15px rgba(0,0,0,0.2); border-radius: 30px; padding: 10px 25px; pointer-events: auto;">
                        Update About Us
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('aboutImageInput').onchange = function (evt) {
        const [file] = this.files;
        const preview = document.getElementById('aboutImagePreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>



@endsection
