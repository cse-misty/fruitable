@extends('backend.dashboard')
@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <!-- LEFT SIDE -->
                    <h5 class="card-title mb-0">
                        {{ __('Reviews') }}
                    </h5>

                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle" id="orderMenage" class="display">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 70px;">SL</th>
                                <th>user</th>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th class="text-center" style="width: 100px;">Status</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($reviews as $key => $review)
                            @php
                                    $serial = $reviews->firstItem() + $key;
                                @endphp

                                <tr>
                                    <td class="text-center">
                                        {{ $serial }}
                                    </td>

                                       <td>
                                        @if($review->user)
                                            <span class="badge bg-secondary">
                                                {{ $review->user->email }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>


                                       <td>
                                        @if($review->product)
                                            <span class="badge bg-secondary">
                                                {{ $review->product->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>

                                    <!-- rating -->
                                    <td>
                                        {{ $review->rating }}
                                    </td>
                                      <td>
                                        {{ $review->date_time ? \Carbon\Carbon::parse($review->date_time)->format('M d, Y h:i A') : $review->created_at->format('M d, Y') }}
                                    </td>

                                    <!-- Status -->
                                    <td class="text-center">
                                        <form action="{{ route('products.toggle-status', $review->id) }}" method="POST" id="status-form-{{ $review->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <label class="switch mb-0">
                                                <input type="checkbox"
                                                       {{ $review->status ? 'checked' : '' }}
                                                       onchange="document.getElementById('status-form-{{ $review->id }}').submit();">
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                       <button type="button"
                                                class="btn btn-success btn-sm replyBtn m-2"
                                                title="Reply"
                                                data-email="{{ $review->user->email ?? '' }}">
                                            <i class="fas fa-reply" style="pointer-events: none;"></i>
                                        </button>





                                        <button type="button"
                                                class="btn btn-info btn-sm"
                                                data-toggle="modal"
                                                data-target="#viewreviewModal-{{ $review->id }}"
                                                title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Bootstrap 4  -->
                                        <div class="modal fade" id="viewreviewModal-{{ $review->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $review->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">

                                                    <div class="modal-header bg-success text-dark">
                                                        <h5 class="modal-title font-weight-bold" id="modalLabel-{{ $review->id }}">
                                                            <i class="fas fa-info-circle me-2"></i> {{ __('Review Details') }}
                                                        </h5>

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body p-4">


                                                        <table class="table table-striped table-bordered mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 40%;">{{ __('User Email') }}</th>
                                                                    <td>
                                                                        @if($review->user)
                                                                            <span class="badge bg-secondary">{{ $review->user->email }}</span>
                                                                        @else
                                                                            <span class="text-muted">N/A</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>

                                                                  <tr>
                                                                    <th style="width: 40%;">{{ __('Product Title') }}</th>
                                                                    <td>
                                                                        @if($review->product)
                                                                            <span class="badge bg-secondary">{{ $review->product->name }}</span>
                                                                        @else
                                                                            <span class="text-muted">N/A</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <th>{{ __('Rating') }}</th>
                                                                    <td class="fw-bold text-dark">{{ $review->rating }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('Date') }}</th>
                                                                    <td> {{ $review->date_time ? \Carbon\Carbon::parse($review->date_time)->format('M d, Y h:i A') : $review->created_at->format('M d, Y') }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>{{ __('Status') }}</th>
                                                                    <td>
                                                                        @if($review->status)
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
                                        <form action="{{ route('reviews.destroy', $review->id) }}"
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
                        {{ $reviews->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- এটি লুপের সম্পূর্ণ বাইরে, পেজের শেষে বসাবেন -->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <form action="{{ route('reviews.reply') }}" method="POST" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Reply Review</h5>
                <!-- বুটস্ট্র্যাপ ৪ এর ক্রস বাটন -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-start">
                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">To Email</label>
                    <input type="email" name="email" id="modal_email" class="form-control bg-light" readonly>
                </div>

                <!-- MESSAGE -->
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="Write your reply here..." required></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Send Reply
                </button>
            </div>

        </form>

    </div>
</div>



<!-- টোস্টার এরর দূর করার জন্য সবার আগে Toastr JS CDN যুক্ত করা হলো -->
<script src="https://cloudflare.com"></script>

<script>
$(document).ready(function() {
    // ১. মডাল ওপেন করার লজিক (বুটস্ট্র্যাপ ৪ এবং jQuery নিয়ম অনুযায়ী)
    $(document).on("click", ".replyBtn", function(e) {
        e.preventDefault();

        let email = $(this).data('email');
        $('#modal_email').val(email);

        // বুটস্ট্র্যাপ ৪ এর সঠিক মেথড দিয়ে মডাল ওপেন
        $('#replyModal').modal('show');
    });

    // ২. মডাল ক্লোজ করার লজিক (যা কালো পর্দা আটকে যাওয়া সম্পূর্ণ বন্ধ করবে)
    $(document).on("click", '[data-bs-dismiss="modal"], [data-dismiss="modal"]', function() {
        $('#replyModal').modal('hide');
    });
});
</script>



@endsection
