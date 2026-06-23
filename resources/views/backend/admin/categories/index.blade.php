@extends('backend.dashboard')
@section('content')


    <div class="container-fluid">


        <div class="card">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                    <!-- LEFT SIDE -->
                    <h5 class="card-title mb-0">
                        {{ __('Categories') }}
                    </h5>

                    <!-- RIGHT SIDE -->
                  <div class="d-flex flex-column align-items-end gap-2 mb-3">

                        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm p-2 d-flex align-items-center mb-3">
                            <i class="fas fa-plus me-1"></i> Add Category
                        </a>
                        {{-- <form action="{{ route('categories.index') }}" method="GET" class="d-flex mb-0">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="form-control"
                                    placeholder="Search category...">
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
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Priority</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($categories as $key => $category)

                                @php
                                    $serial = $categories->firstItem() + $key;
                                @endphp

                                <tr>

                                    <!-- SL -->
                                    <td class="text-center">
                                        {{ $serial }}
                                    </td>

                                    <!-- Thumbnail -->
                                    <td>
                                        @if($category->thumbnail)
                                            <img src="{{ asset('storage/'.$category->thumbnail) }}"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        {{ $category->title }}
                                    </td>

                                    <!-- Priority -->
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $category->priority }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="text-center">
                                        <form action="{{ route('products.toggle-status', $category->id) }}" method="POST" id="status-form-{{ $category->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <label class="switch mb-0">
                                                <input type="checkbox"
                                                       {{ $category->status ? 'checked' : '' }}
                                                       onchange="document.getElementById('status-form-{{ $category->id }}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- View Button -->
                                        <a href="{{ route('categories.show', $category->id) }}"
                                        class="btn btn-info btn-sm"
                                        title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('categories.destroy', $category->id) }}"
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
                        {{ $categories->withQueryString()->links() }}
                    </div>

                </div>

            </div>

        </div>



    </div>



@endsection
