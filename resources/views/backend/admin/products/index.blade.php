@extends('backend.dashboard')
@section('content')



    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                    <!-- LEFT SIDE -->
                    <h5 class="card-title mb-0">
                        {{ __('Products List') }}
                    </h5>

                    <!-- RIGHT SIDE -->
                  <div class="d-flex flex-column align-items-end gap-2 mb-3">

                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm p-2 d-flex align-items-center mb-3">
                            <i class="fas fa-plus me-1"></i> Add Product
                        </a>
                          <a href="{{ route('products.bulk-upload') }}" class="btn btn-success btn-sm p-2 d-flex align-items-center mb-3">
                            <i class="fas fa-plus me-1"></i> multiple add Product
                        </a>
                        {{-- <form action="{{ route('products.index') }}" method="GET" class="d-flex mb-0">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="form-control"
                                    placeholder="Search product...">
                                <button class="btn btn-primary" type="submit">
                                    Search
                                </button>
                            </div>
                        </form> --}}
                    </div>


                </div>

                <!-- Table -->
                <div class="table-responsive">

                    <table class="table table-hover table-bordered align-middle" id="orderMenage" class="display">

                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 70px;">SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                 <th>Sub Category </th>
                                <th>Priority</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($products as $key => $product)

                                @php
                                    $serial = $products->firstItem() + $key;
                                @endphp

                                <tr>

                                    <!-- SL -->
                                    <td class="text-center">
                                        {{ $serial }}
                                    </td>

                                    <!-- Thumbnail -->
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <!-- Category -->
                                    <td>
                                        @if($product->category)
                                            <span class="badge bg-secondary">
                                                {{ $product->category->title }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                      <td>
                                        @if($product->subcategory)
                                            <span class="badge bg-secondary">
                                                {{ $product->subcategory->title }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <!-- Priority -->
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $product->priority }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="text-center">
                                        <form action="{{ route('products.toggle-status', $product->id) }}" method="POST" id="status-form-{{ $product->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <label class="switch mb-0">
                                                <input type="checkbox"
                                                       {{ $product->status ? 'checked' : '' }}
                                                       onchange="document.getElementById('status-form-{{ $product->id }}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary btn-sm"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- View Button -->
                                        <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-info btn-sm"
                                        title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('products.destroy', $product->id) }}"
                                            method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
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
            {{ $products->withQueryString()->links() }}
        </div>

                </div>

            </div>

        </div>



    </div>



@endsection
