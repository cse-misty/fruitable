@extends('backend.dashboard')

@section('content')



<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h4 class="mb-0 text-dark font-weight-bold">
                    <i class="fas fa-info-circle text-primary me-2"></i>{{ $category->title }}
                </h4>

                <div class="d-flex gap-2">
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $category->id) }}" class="btn btn-warning text-dark rounded-pill px-4 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-edit me-2"></i> Edit
                    </a> &nbsp; &nbsp;
                    <!-- Back Button -->
                    <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm font-weight-bold">
                        <i class="fas fa-arrow-left me-2"></i> Back
                    </a>
                </div>
            </div>

            <!-- DETAILS VIEW -->
            <div class="row">

                <!-- Left Side: Images -->
                <div class="col-md-4 mb-4">
                    <div class="text-center p-3 border rounded bg-light mb-3">
                        <label class="form-label d-block font-weight-bold text-dark  mb-2">Original Image</label>
                        @if($category->image)
                            <img src="{{ asset('storage/'.$category->image) }}" alt="Original Image" class="img-fluid rounded shadow-sm" style="max-height: 220px; object-fit: cover;">
                        @else
                            <div class="py-5 text-dark "><i class="fas fa-image fa-3x mb-2"></i><br>No Image</div>
                        @endif
                    </div>

                    <div class="text-center p-3 border rounded bg-light">
                        <label class="form-label d-block font-weight-bold text-dark  mb-2">Generated Thumbnail</label>
                        @if($category->thumbnail)
                            <img src="{{ asset('storage/'.$category->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded shadow-sm" style="max-height: 120px; object-fit: cover;">
                        @else
                            <div class="py-3 text-dark "><i class="fas fa-image fa-2x mb-2"></i><br>No Thumbnail</div>
                        @endif
                    </div>
                </div>

                <!-- Right Side: Info Table -->
                <div class="col-md-8 mb-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <tbody>
                                <tr>
                                    <th style="width: 30%;" class="table-light font-weight-bold text-dark ">Title</th>
                                    <td class="font-weight-bold text-dark">{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <th class="table-light font-weight-bold text-dark ">Priority</th>
                                    <td>
                                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill font-weight-bold">
                                            {{ $category->priority }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-light font-weight-bold text-dark ">Status</th>
                                    <td>
                                        @if($category->status)
                                            <span class="badge bg-success px-3 py-2 rounded-pill font-weight-bold text-white">
                                                <i class="fas fa-check-circle me-1"></i> Active
                                            </span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2 rounded-pill font-weight-bold text-white">
                                                <i class="fas fa-times-circle me-1"></i> Inactive
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-light font-weight-bold text-dark ">Created At</th>
                                    <td class="text-dark ">{{ $category->created_at ? $category->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-light font-weight-bold text-dark ">Last Updated</th>
                                    <td class="text-dark ">{{ $category->updated_at ? $category->updated_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="table-light font-weight-bold text-dark ">Description</th>
                                    <td>
                                        <div class="p-2 border rounded bg-white text-dark " style="min-height: 100px; white-space: pre-line;">
                                            {{ $category->description ?? 'No description provided for this category.' }}
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

</div>

@endsection
