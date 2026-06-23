@extends('backend.dashboard')

@section('content')
<div class="d-flex align-items-center justify-content-between px-3 mb-3">
    <h4 class="mb-0 text-dark font-weight-bold">{{ __('Product Details') }}</h4>
</div>

<div class="container-fluid">

    <div class="card-body p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <h4 class="mb-0 text-dark fw-bold">
                <i class="fas fa-box-open text-primary me-2"></i>
                {{ $product->name }}
            </h4>

            <div class="d-flex gap-4">
                <a href="{{ route('products.edit', $product->id) }}"
                   class="btn btn-warning text-dark rounded-pill px-4 py-2 shadow-sm fw-bold">
                    <i class="fas fa-edit me-2"></i> Edit
                </a> &nbsp; &nbsp;

                <a href="{{ route('products.index') }}"
                   class="btn btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>
        </div>

        <div class="row">

            <!-- Product Image -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">

                        <h6 class="fw-bold mb-3">Product Image</h6>

                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid rounded shadow"
                                 style="max-height:250px; object-fit:cover;">
                        @else
                            <div class="py-5 text-muted">
                                <i class="fas fa-image fa-3x mb-3"></i>
                                <p class="mb-0">No Image Available</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">

                        <tbody>

                            <tr>
                                <th width="30%" class="table-light">Product Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>

                            <tr>
                                <th class="table-light">Category</th>
                                <td>{{ $product->category->title ?? 'N/A' }}</td>
                            </tr>
                                  <tr>
                                <th class="table-light">Sub Category</th>
                                <td>{{ $product->subcategory->title ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th class="table-light">Price</th>
                                <td>
                                    <span class="badge bg-success px-3 py-2">
                                         {{ number_format($product->price, 2) }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Priority</th>
                                <td>
                                    <span class="badge bg-info text-dark px-3 py-2">
                                        {{ $product->priority }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Status</th>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success px-3 py-2">
                                            <i class="fas fa-check-circle me-1"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2">
                                            <i class="fas fa-times-circle me-1"></i> Inactive
                                        </span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Created At</th>
                                <td>
                                    {{ $product->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Last Updated</th>
                                <td>
                                    {{ $product->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Description</th>
                                <td>
                                    <div class="p-3 bg-light rounded">
                                        {!! nl2br(e($product->description ?? 'No description available.')) !!}
                                    </div>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
