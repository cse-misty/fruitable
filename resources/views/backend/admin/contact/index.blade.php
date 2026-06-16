@extends('backend.dashboard')

@section('content')

<div class="d-flex align-items-center justify-content-between px-3 mb-3">
    <h4 class="mb-0">Contact List</h4>
</div>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                <h5 class="card-title mb-0">Contact</h5>

                <!-- Search -->
                <form action="{{ route('contact.index') }}" method="GET" class="d-flex">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search contact...">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>

            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center">SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($contacts as $key => $contact)

                            @php
                                $serial = $contacts->firstItem() + $key;
                            @endphp

                            <tr>
                                <td class="text-center">{{ $serial }}</td>

                                <td>{{ $contact->name }}</td>

                                <td>
                                    <span class="badge text-dark">
                                        {{ $contact->email }}
                                    </span>
                                </td>

                                <td>
                                    {{ $contact->message }}
                                </td>

                                <!-- ACTION -->
                               <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2 ">

                                        <!-- REPLY BUTTON -->
                                        {{-- <button type="button"
                                                class="btn btn-success btn-sm replyBtn m-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#replyModal"
                                                data-email="{{ $contact->email }}">
                                            <i class="fas fa-reply"></i>
                                        </button> --}}

                                        <button type="button"
                                                class="btn btn-success btn-sm replyBtn m-2"
                                                data-email="{{ $contact->email }}">
                                            <i class="fas fa-reply" style="pointer-events: none;"></i>
                                        </button>





                                        <!-- DELETE BUTTON -->
                                        <form action="{{ route('contact.destroy', $contact->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm m-2"
                                                    onclick="return confirm('Delete this contact?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    No Data Found
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
        {{ $contacts->withQueryString()->links() }}
    </div>

</div>

<!-- ================= REPLY MODAL ================= -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">

    <form action="{{ route('contact.reply') }}" method="POST" class="modal-content">
        @csrf

        <div class="modal-header">
            <h5 class="modal-title">Reply Contact</h5>
            <button type="button" class="btn border-0" data-bs-dismiss="modal">
        <i class="fas fa-times"></i>
    </button>
        </div>

        <div class="modal-body">

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">To Email</label>
                <input type="email" name="email" id="modal_email"
                       class="form-control" readonly>
            </div>

            <!-- MESSAGE -->
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary">
                Send Reply
            </button>
        </div>

    </form>

  </div>
</div>



<script>
document.addEventListener("click", function(e) {
    let btn = e.target.closest('.replyBtn');

    if (btn) {

        let email = btn.getAttribute('data-email');
        document.getElementById('modal_email').value = email;


        let myModal = new bootstrap.Modal(document.getElementById('replyModal'));
        myModal.show();
    }
});

if (e.target.closest('[data-bs-dismiss="modal"]') || e.target.closest('[data-dismiss="modal"]')) {
        let modalEl = document.getElementById('replyModal');
        let modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) {
            modalInstance.hide();
        }
    }


</script>



@endsection

