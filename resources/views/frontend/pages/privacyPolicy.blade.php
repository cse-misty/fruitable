@extends('frontend.layouts')

@section('content')

<div class="container-fluid page-header py-5 bg-dark mb-5"> 
    <h1 class="text-center text-white display-6">{{ $page->title }}</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white-50">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="text-white-50">Pages</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">{{ $page->title }}</li>
    </ol>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 bg-white rounded">
                <div class="card-body p-4 p-md-5">

                    <h2 class="mb-4 text-dark font-weight-bold">{{ $page->title }}</h2>
                    <hr class="mb-4">


                    <div class="page-content-wrapper lh-lg text-black" style="text-align: justify;">
                        {!! $page->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
