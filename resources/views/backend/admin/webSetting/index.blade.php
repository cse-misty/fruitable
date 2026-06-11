@extends('backend.dashboard')

@section('content')

<form action="{{ route('web_settings.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0 fw-bold text-dark">Website Settings</h4>
    </div>

    <div class="card-body">

        <!-- Basic Information -->
        <h5 class="mb-3 text-primary fw-bold border-bottom pb-2">
            Basic Information
        </h5>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Site Name</label>
                <input type="text" name="site_name" class="form-control"
                    value="{{ old('site_name', $setting->site_name ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Site Title</label>
                <input type="text" name="site_title" class="form-control"
                    value="{{ old('site_title', $setting->site_title ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control"
                    value="{{ old('meta_keywords', $setting->meta_keywords ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Primary Email</label>
                <input type="email" name="email_primary" class="form-control"
                    value="{{ old('email_primary', $setting->email_primary ?? '') }}">
            </div>

            <div class="col-12 mb-3">
                <label class="form-label fw-bold">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
            </div>
        </div>

        <hr>

        <!-- Logos -->
        <h5 class="mb-3 text-primary fw-bold border-bottom pb-2">
            Logo Settings
        </h5>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Header Logo</label>
                <input type="file" name="logo_header" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Footer Logo</label>
                <input type="file" name="logo_footer" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Favicon</label>
                <input type="file" name="favicon" class="form-control">
            </div>
        </div>

        <hr>

        <!-- Contact -->
        <h5 class="mb-3 text-primary fw-bold border-bottom pb-2">
            Contact Information
        </h5>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Phone 1</label>
                <input type="text" name="phone_1" class="form-control"
                    value="{{ old('phone_1', $setting->phone_1 ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Phone 2</label>
                <input type="text" name="phone_2" class="form-control"
                    value="{{ old('phone_2', $setting->phone_2 ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Support Email</label>
                <input type="email" name="email_support" class="form-control"
                    value="{{ old('email_support', $setting->email_support ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Google Map URL</label>
                <input type="text" name="google_map_url" class="form-control"
                    value="{{ old('google_map_url', $setting->google_map_url ?? '') }}">
            </div>

            <div class="col-12 mb-3">
                <label class="form-label fw-bold">Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address', $setting->address ?? '') }}</textarea>
            </div>
        </div>

        <hr>

        <!-- Social Media -->
        <h5 class="mb-3 text-primary fw-bold border-bottom pb-2">
            Social Media Links
        </h5>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Facebook URL</label>
                <input type="url" name="facebook_url" class="form-control"
                    value="{{ old('facebook_url', $setting->facebook_url ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Twitter URL</label>
                <input type="url" name="twitter_url" class="form-control"
                    value="{{ old('twitter_url', $setting->twitter_url ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">LinkedIn URL</label>
                <input type="url" name="linkedin_url" class="form-control"
                    value="{{ old('linkedin_url', $setting->linkedin_url ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">YouTube URL</label>
                <input type="url" name="youtube_url" class="form-control"
                    value="{{ old('youtube_url', $setting->youtube_url ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Instagram URL</label>
                <input type="url" name="instagram_url" class="form-control"
                    value="{{ old('instagram_url', $setting->instagram_url ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Copyright Text</label>
                <input type="text" name="copyright_text" class="form-control"
                    value="{{ old('copyright_text', $setting->copyright_text ?? '') }}">
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary px-4">
                Update Settings
            </button>

            <a href="{{ route('web_settings.index') }}" class="btn btn-secondary px-4">
                Cancel
            </a>
        </div>

    </div>
</div>

</form>

@endsection
