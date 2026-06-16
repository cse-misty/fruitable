@extends('backend.dashboard')

@section('content')

<div class="container">

    <!-- অ্যাকশন এবং এনক্রিপশন টাইপ ঠিক রাখা হয়েছে -->
    <form action="{{ route('hero.slider.store') }}"
          method="POST"
          enctype="multipart/form-data"
          id="heroForm">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Sub Title</label>
                <input type="text" name="sub_title" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Main Title</label>
                <input type="text" name="main_title" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Badge Text</label>
                <input type="text" name="badge_text" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Text One</label>
                <input type="text" name="text_one" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Text Two</label>
                <input type="text" name="text_two" class="form-control">
            </div>

        </div>

        <!-- ================= DROPZONE ================= -->
        <div class="mb-3">
            <label class="form-label fw-bold">Slider Images</label>
            <div class="dropzone" id="heroDropzone"></div>
        </div>

        <!-- বাটনের টাইপ submit থেকে button করা হয়েছে যেন ড্রপজোন কন্ট্রোল করতে পারে -->
        <button type="button" class="btn btn-primary" id="submitBtn">
            Upload Slider
        </button>

    </form>

</div>

@endsection

@push('js')
<script>
Dropzone.autoDiscover = false;

// ড্রপজোন কনফিগারেশন
const myDropzone = new Dropzone("#heroDropzone", {
    url: "{{ route('hero.slider.store') }}",
    paramName: "image", // কন্ট্রোলারের $request->validate(['image' => ...]) এর সাথে মিল রেখে
    uploadMultiple: true, // একসাথে একাধিক ইমেজ পাঠাবে (এতেই কন্ট্রোলারের 'required|array' পাস হবে)
    parallelUploads: 10, // সর্বোচ্চ কয়টি ফাইল একসাথে প্রসেস করবে
    maxFilesize: 2, // ২ মেগাবাইট সাইজ লিমিট
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    autoProcessQueue: false, // বাটন ক্লিক না করা পর্যন্ত আপলোড স্টার্ট হবে না

    init: function () {
        const dzClosure = this;

        // আপলোড বাটনে ক্লিক করলে ড্রপজোন ডাটা প্রসেস করবে
        document.getElementById("submitBtn").addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            // যদি ড্রপজোনে কোনো ফাইল সিলেক্ট করা থাকে
            if (dzClosure.getQueuedFiles().length > 0) {
                dzClosure.processQueue();
            } else {
                alert("Please select at least one image.");
            }
        });

        // ফর্মের অন্যান্য টেক্সট ফিল্ডের ডাটা ড্রপজোনের সাথে যুক্ত করার লজিক
        this.on("sendingmultiple", function (data, xhr, formData) {
            // ফর্মের অন্যান্য ইনপুটের ডাটা অ্যাপেন্ড করা হচ্ছে
            const formInputs = document.querySelectorAll('#heroForm input:not([type="file"])');
            formInputs.forEach(input => {
                formData.append(input.name, input.value);
            });
        });

        // সফলভাবে আপলোড সম্পন্ন হলে রিডাইরেক্ট হবে
        this.on("successmultiple", function (files, response) {
            if(response.success) {
                // কন্ট্রোলারের SweetAlert বা নরমাল অ্যালার্ট দেখাবে
                alert(response.message);

                // আপনার ইনডেক্স পেজে রিডাইরেক্ট করে নিয়ে যাবে
                window.location.href = "{{ route('hero.slider.index') }}";
            }
        });

        // কোনো এরর আসলে তা হ্যান্ডেল করার জন্য
        this.on("errormultiple", function (files, response) {
            console.error(response);
            alert("Something went wrong! Check validation or logs.");
        });

        // ইমেজে ক্লিক করলে প্রিভিউ দেখার আপনার আগের লজিকটি
        this.on("success", function(file, response) {
            file.previewElement.addEventListener("click", function () {
                if (file.dataURL) {
                    window.open(file.dataURL, "_blank");
                }
            });
        });
    }
});
</script>
@endpush
