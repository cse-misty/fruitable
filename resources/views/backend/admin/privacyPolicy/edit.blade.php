@extends('backend.dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Page: {{ $page->title }}</h5>
                    <a href="{{ route('pages.index') }}" class="btn btn-light btn-sm">Back to List</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Page Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Page Slug (URL)</label>
                            <input type="text" name="slug" class="form-control" value="{{ $page->slug }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Page Content</label>
                            <textarea name="content" class="form-control" rows="8" required>{{ $page->content }}</textarea>
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label font-weight-bold">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" {{ $page->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $page->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div> --}}

                        <button type="submit" class="btn btn-primary w-100">Update Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
