@extends('backend.dashboard')

@section('content')

<div class="container">

    <form action="{{ route('hero.slider.update', $heroSlider->id) }}"
          method="POST"
          enctype="multipart/form-data"
          id="heroForm">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Sub Title</label>
                <input type="text" name="sub_title" value="{{ $heroSlider->sub_title }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Main Title</label>
                <input type="text" name="main_title" value="{{ $heroSlider->main_title }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Badge Text</label>
                <input type="text" name="badge_text" value="{{ $heroSlider->badge_text }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Text One</label>
                <input type="text" name="text_one" value="{{ $heroSlider->text_one }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Text Two</label>
                <input type="text" name="text_two" value="{{ $heroSlider->text_two }}" class="form-control">
            </div>

        </div>

        <!-- ================= DROPZONE ================= -->
        <div class="mb-3">
            <label class="form-label fw-bold">Slider Images </label>
            <div class="dropzone" id="heroDropzone"></div>
        </div>

        <button type="button" class="btn btn-primary" id="submitBtn">
            Update Slider
        </button>

    </form>

</div>

@endsection

@push('js')
<script>
Dropzone.autoDiscover = false;


@php
    $sliderImages = is_string($heroSlider->image) ? json_decode($heroSlider->image, true) : $heroSlider->image;
    $existingImages = is_array($sliderImages) ? $sliderImages : ($sliderImages ? [$sliderImages] : []);
@endphp

const myDropzone = new Dropzone("#heroDropzone", {
    url: "{{ route('hero.slider.update', $heroSlider->id) }}",
    paramName: "image",
    uploadMultiple: true,
    parallelUploads: 10,
    maxFilesize: 2,
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    autoProcessQueue: false,

    init: function () {
        const dzClosure = this;


        const existingFiles = @json($existingImages);

        const storageUrl = "{{ asset('storage') }}";

        if (existingFiles && existingFiles.length > 0) {
            existingFiles.forEach(function (imagePath) {
                if (imagePath) {
                    let fileName = imagePath.split('/').pop();
                    let mockFile = { name: fileName, size: 12345, accepted: true };

                    dzClosure.emit("addedfile", mockFile);

                    dzClosure.emit("thumbnail", mockFile, storageUrl + '/' + imagePath);
                    dzClosure.emit("complete", mockFile);

                    dzClosure.files.push(mockFile);
                }
            });
        }

        document.getElementById("submitBtn").addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();


            if (dzClosure.getQueuedFiles().length > 0) {
                dzClosure.processQueue();
            } else {
                submitFormWithoutNewImages();
            }
        });

        this.on("sendingmultiple", function (data, xhr, formData) {
            formData.append('_method', 'PUT');

            const formInputs = document.querySelectorAll('#heroForm input:not([type="file"])');
            formInputs.forEach(input => {
                formData.append(input.name, input.value);
            });
        });

        this.on("successmultiple", function (files, response) {
            alert("Slider updated successfully!");
            window.location.href = "{{ route('hero.slider.index') }}";
        });

        this.on("errormultiple", function (files, response) {
            console.error(response);
            alert("Something went wrong during image upload!");
        });
    }
});

function submitFormWithoutNewImages() {
    let form = document.getElementById('heroForm');
    let formData = new FormData(form);

    $.ajax({
        url: "{{ route('hero.slider.update', $heroSlider->id) }}",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            alert("Slider updated successfully!");
            window.location.href = "{{ route('hero.slider.index') }}";
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert("Something went wrong while updating!");
        }
    });
}
</script>
@endpush
