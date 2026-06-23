@extends('backend.dashboard')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <!-- LEFT SIDE -->
                    <h5 class="card-title mb-0">
                        {{ __('Sub Categories') }}
                    </h5>

                    <!-- RIGHT SIDE -->
                    <div class="d-flex flex-column align-items-end gap-2 mb-3">
                        <a href="{{ route('sub-category.create') }}" class="btn btn-success btn-sm p-2 d-flex align-items-center mb-3">
                            <i class="fas fa-plus me-1"></i> Add Sub Category
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle" id="orderMenage">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 70px;">SL</th>
                                <th>Image</th>
                                <th>Category Name</th>
                               
                                <th>Title</th>
                                <th>Priority</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($subCategories as $key => $subCategory)

                                @php
                                    $serial = $subCategories->firstItem() + $key;
                                @endphp

                                <tr>
                                    <!-- SL -->
                                    <td class="text-center">
                                        {{ $serial }}
                                    </td>

                                    <!-- Thumbnail -->
                                    <td>
                                        @if($subCategory->image)
                                            <img src="{{ asset('uploads/subcategory/'.$subCategory->image) }}"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                       <td>
                                        @if($subCategory->category)
                                            <span class="badge bg-secondary">
                                                {{ $subCategory->category->title }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        {{ $subCategory->title }}
                                    </td>

                                    <!-- Priority -->
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $subCategory->priority ?? '0' }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="text-center">
                                        <form action="{{ route('products.toggle-status', $subCategory->id) }}" method="POST" id="status-form-{{ $subCategory->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <label class="switch mb-0">
                                                <input type="checkbox"
                                                       {{ $subCategory->status ? 'checked' : '' }}
                                                       onchange="document.getElementById('status-form-{{ $subCategory->id }}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('sub-category.edit', $subCategory->id) }}"
                                        class="btn btn-primary btn-sm"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>



                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-toggle="modal"
                                                data-target="#viewSubCategoryModal-{{ $subCategory->id }}"
                                                title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Bootstrap 4  -->
                                        <div class="modal fade" id="viewSubCategoryModal-{{ $subCategory->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $subCategory->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">

                                                    <div class="modal-header bg-success text-dark">
                                                        <h5 class="modal-title font-weight-bold" id="modalLabel-{{ $subCategory->id }}">
                                                            <i class="fas fa-info-circle me-2"></i> {{ __('Sub Category Details') }}
                                                        </h5>

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body p-4">

                                                        <div class="text-center mb-4">
                                                            @if($subCategory->image)
                                                                <img src="{{ asset('uploads/subcategory/'.$subCategory->image) }}" class="img-thumbnail shadow-sm" style="max-height: 180px; width: 180px; object-fit: cover; border-radius: 10px;">
                                                            @else
                                                                <img src="https://placehold.co" class="img-thumbnail shadow-sm" style="max-height: 180px; width: 180px; object-fit: cover; border-radius: 10px;">
                                                            @endif
                                                        </div>

                                                        <table class="table table-striped table-bordered mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 40%;">{{ __('Parent Category') }}</th>
                                                                    <td>
                                                                        @if($subCategory->category)
                                                                            <span class="badge bg-secondary">{{ $subCategory->category->title ?? $subCategory->category->name }}</span>
                                                                        @else
                                                                            <span class="text-muted">N/A</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('Title') }}</th>
                                                                    <td class="fw-bold text-dark">{{ $subCategory->title }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('Slug') }}</th>
                                                                    <td><code>{{ $subCategory->slug }}</code></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('Priority') }}</th>
                                                                    <td><span class="badge bg-light text-dark border">{{ $subCategory->priority ?? 0 }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('Status') }}</th>
                                                                    <td>
                                                                        @if($subCategory->status)
                                                                            <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Active</span>
                                                                        @else
                                                                            <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i> Inactive</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="modal-footer bg-success">
                                                        <button type="button" class="btn btn-black px-4 rounded-pill" data-dismiss="modal">
                                                            {{ __('Close') }}
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>





                                        <!-- Delete Button -->
                                        <form action="{{ route('sub-category.destroy', $subCategory->id) }}"
                                            method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        {{ __('No Data Found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $subCategories->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
