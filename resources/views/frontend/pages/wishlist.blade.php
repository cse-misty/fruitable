@extends('frontend.layouts')
@section('content')

   <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">My Wishlist</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">My Wishlist</li>
            </ol>
        </div>


<div class="container py-5">
    <h2 class="mb-4">My Wishlist</h2>

    @if($wishlistItems->isEmpty())
        <div class="alert alert-info text-center">Your wishlist is empty!</div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishlistItems as $item)
                        <tr>
                            <td>
                                <img src="{{ asset($item->product->image) }}" style="width: 50px;" class="img-fluid rounded me-3" alt="">
                                {{ $item->product->name }}
                            </td>
                            <td>{{format_price( $item->product->price )}}</td>
                            <td>

                                <a href="{{ route('web.shop-details', $item->product->id) }}" class="btn btn-primary btn-sm">
                                    Add to Cart
                                </a>


                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
