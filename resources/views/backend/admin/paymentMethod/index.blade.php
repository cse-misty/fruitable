@extends('backend.dashboard')

@section('content')

<form action="{{ route('payment.method.update', $stripe->id ?? 1) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card">

        <!-- Header -->
        <div class="card-header bg-white">
            <h4 class="mb-0 fw-bold text-dark">Stripe Payment Settings</h4>
        </div>

        <div class="card-body">

            <!-- Basic Info -->
            <h5 class="mb-3 text-primary fw-bold border-bottom pb-2">
                Stripe Configuration
            </h5>

       <div class="row">

            <!-- Name -->
            <div class="col-md-2 mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $stripe->name ?? '') }}">
            </div>

            <!-- Title -->
            <div class="col-md-2 mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control"
                    value="{{ old('title', $stripe->title ?? '') }}">
            </div>

            <!-- Mode -->
            <div class="col-md-2 mb-3">
                <label class="form-label fw-bold">Mode</label>
                <select name="mode" class="form-control">
                    <option value="sandbox" {{ ($stripe->mode ?? '') == 'sandbox' ? 'selected' : '' }}>Sandbox</option>
                    <option value="live" {{ ($stripe->mode ?? '') == 'live' ? 'selected' : '' }}>Live</option>
                </select>
            </div>

               <!-- Payment Gateway Title -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Payment Gateway Title</label>
                <input type="text" name="payment_gateway_title" class="form-control"
                    value="{{ old('payment_gateway_title', $stripe->payment_gateway_title ?? '') }}">
            </div>

            <!-- Secret Key -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Secret Key</label>
                <input type="text" name="secret_key" class="form-control"
                    value="{{ old('secret_key', $stripe->secret_key ?? '') }}">
            </div>

            <!-- Publishable Key -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Publishable Key</label>
                <input type="text" name="published_key" class="form-control"
                    value="{{ old('published_key', $stripe->published_key ?? '') }}">
            </div>



       <!-- Image -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Image</label>

            <input type="file" name="image" class="form-control">

            @if(!empty($stripe->image))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $stripe->image) }}"
                        alt="Image"
                        style="width: 120px; height: auto; border-radius: 8px;">
                </div>
            @endif
        </div>

        </div>

                    <!-- Buttons -->
                <div style="position: sticky; bottom: 20px; text-align: right; margin-top: 20px; z-index: 1050; pointer-events: none;">
                    <button type="submit" class="btn btn-primary px-4 m-3" style="font-size: 15px; font-weight: 400; box-shadow: 0px 4px 15px rgba(0,0,0,0.2); border-radius: 30px; padding: 10px 25px; pointer-events: auto;">
                        Update Stripe Settings
                    </button>
                </div>


            </div>

        </div>
    </div>

</form>

@endsection
