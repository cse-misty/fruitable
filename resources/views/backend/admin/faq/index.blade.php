@extends('backend.dashboard')
@section('content')

    <div class="d-flex align-items-center justify-content-between px-3 mb-3">
        <h4 class="mb-0">{{ __('faq List') }}</h4>
    </div>

    <div class="container-fluid">


        <div class="card">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                    <!-- LEFT SIDE -->
                    <h5 class="card-title mb-0">
                        {{ __('Faq') }}
                    </h5>

                    <!-- RIGHT SIDE -->
                  <div class="d-flex flex-column align-items-end gap-2 mb-3">

                        <a href="{{ route('faq.create') }}" class="btn btn-success btn-sm p-2 d-flex align-items-center mb-3">
                            <i class="fas fa-plus me-1"></i> Add Faq
                        </a>
                        <form action="{{ route('faq.index') }}" method="GET" class="d-flex mb-0">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    class="form-control"
                                    placeholder="Search faq...">
                                <button class="btn btn-primary" type="submit">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>


                </div>

                <!-- Table -->
                <div class="table-responsive">

                    <table class="table table-hover table-bordered align-middle">

                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 70px;">SL</th>
                                <th>Questions</th>
                                <th>Answer</th>
                                <th>Catagory name</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($faqs as $key => $faq)
                            @php
                                $serial = $faqs->firstItem() + $key;
                            @endphp

                                <tr>

                                    <!-- SL -->
                                    <td class="text-center">
                                        {{ $serial }}
                                    </td>




                                    <!-- Title -->
                                    <td>
                                        {{ $faq->question }}
                                    </td>
                                      <td>
                                        {{ $faq->answer }}
                                    </td>
                                      <td>
                                       {{ $faq->category->name ?? 'N/A' }}
                                    </td>



                                    <!-- Status -->
                                    <td class="text-center">
                                        <form action="{{ route('products.toggle-status', $faq->id) }}" method="POST" id="status-form-{{ $faq->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <label class="switch mb-0">
                                                <input type="checkbox"
                                                       {{ $faq->status ? 'checked' : '' }}
                                                       onchange="document.getElementById('status-form-{{ $faq->id }}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('faq.edit', $faq->id) }}"
                                        class="btn btn-primary btn-sm"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- View Button -->
                                        {{-- <a href="{{ route('faq.show', $faq->id) }}"
                                        class="btn btn-info btn-sm"
                                        title="View">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}

                                        <!-- Delete Button -->
                                        <form action="{{ route('faq.destroy', $faq->id) }}"
                                            method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this faq?')">
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

                </div>

            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $faqs->withQueryString()->links() }}
        </div>

    </div>



@endsection
