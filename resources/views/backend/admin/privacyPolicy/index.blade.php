@extends('backend.dashboard')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light text-black d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Dynamic Pages</h5>

            <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm p-2    k



            m-2">Create New Page</a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-bordered mb-0">
                <thead class="table-light">
                    <tr class="text-black">
                        <th>#</th>
                        <th>Page Title</th>
                        <th>Slug (URL)</th>
                        {{-- <th>Status</th> --}}
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->title }}</td>
                            <td>
                                <a href="{{ url('/page/' . $p->slug) }}" target="_blank" class="text-info">
                                    /page/{{ $p->slug }}
                                </a>
                            </td>

                             <td class="text-center">

                                {{-- <a href="{{ url('/page/' . $p->slug) }}" target="_blank" class="btn btn-sm btn-info text-white" title="View Live">
                                    <i class="fas fa-eye"></i> View Live
                                </a> --}}


                                <a href="{{ route('pages.edit', $p->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>


                                <form action="{{ route('pages.destroy', $p->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this page?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>



                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No pages found. Click "Create New Page" to add one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table
</div>
@endsection
