@extends('backend.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"> Product Services </h5>
                </div>


                <h4 class=" p-3 text-dark fw-bold">Fresh Apple</h4>

            <form action="{{ route('services.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row p-4">

                       <!-- Fresh BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="fresh_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('fresh_bg_color', $services->fresh_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="fresh_bg_color" id="fresh_bg_color" class="form-control color-text"
                                value="{{ old('fresh_bg_color', $services->fresh_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 1. Fresh Content BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Content BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="fresh_content_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('fresh_content_bg_color', $services->fresh_content_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="fresh_content_bg_color" id="fresh_content_bg_color" class="form-control color-text"
                                value="{{ old('fresh_content_bg_color', $services->fresh_content_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 2. Fresh Title Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Title Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="fresh_title_color_picker" class="form-control color-picker"
                                    value="{{ old('fresh_title_color', $services->fresh_title_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="fresh_title_color" id="fresh_title_color" class="form-control color-text"
                                value="{{ old('fresh_title_color', $services->fresh_title_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>

                    <!-- 3. Fresh Offer Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Offer Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="fresh_offer_color_picker" class="form-control color-picker"
                                    value="{{ old('fresh_offer_color', $services->fresh_offer_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="fresh_offer_color" id="fresh_offer_color" class="form-control color-text"
                                value="{{ old('fresh_offer_color', $services->fresh_offer_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>

                   <div class="col-md-2 mb-3">
                        <label class="form-label fw-semibold" style="font-size: 15px; color: #495057;">Product Services Title</label>

                        <input type="text" name="service_title" class="form-control"
                        value="{{ old('service_title', $services->service_title ?? '') }}"

                            placeholder="Enter services main title...">
                    </div>


                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Title</label>
                        <input type="text" name="fresh_title" class="form-control"
                            value="{{ old('fresh_title', $services->fresh_title ?? '') }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Offer Text</label>
                        <input type="text" name="fresh_offer_text" class="form-control"
                            value="{{ old('fresh_offer_text', $services->fresh_offer_text ?? '') }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Image</label>
                        <input type="file" name="fresh_image" class="form-control mb-2">

                        @if(!empty($services->fresh_image))
                            <div class="mt-2">
                                <p class="mb-1" style="font-size: 12px; color: #6c757d;">Current Image:</p>
                                <img src="{{ asset('uploads/services/' . $services->fresh_image) }}"
                                    alt="Fresh Image"
                                    style="max-width: 150px; max-height: 150px; object-fit: cover; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Fresh Link</label>
                        <input type="text" name="fresh_link" class="form-control"
                            value="{{ old('fresh_link', $services->fresh_link ?? '') }}">
                    </div>



                </div>

                   </hr>

                <h4 class=" p-3 text-dark fw-bold">Testy Fruits</h4>

                   <div class="row p-4">

                    <!-- 1. Testy BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <!-- class পরিবর্তন করে color-picker করা হয়েছে -->
                                <input type="color" id="tasty_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('tasty_bg_color', $services->tasty_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <!-- class পরিবর্তন করে color-text করা হয়েছে -->
                            <input type="text" name="tasty_bg_color" id="tasty_bg_color" class="form-control color-text"
                                value="{{ old('tasty_bg_color', $services->tasty_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 2. Testy Content BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Content BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="tasty_content_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('tasty_content_bg_color', $services->tasty_content_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="tasty_content_bg_color" id="tasty_content_bg_color" class="form-control color-text"
                                value="{{ old('tasty_content_bg_color', $services->tasty_content_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 3. Testy Title Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Title Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="tasty_title_color_picker" class="form-control color-picker"
                                    value="{{ old('tasty_title_color', $services->tasty_title_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="tasty_title_color" id="tasty_title_color" class="form-control color-text"
                                value="{{ old('tasty_title_color', $services->tasty_title_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>

                    <!-- 4. Testy Offer Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Offer Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="tasty_offer_color_picker" class="form-control color-picker"
                                    value="{{ old('tasty_offer_color', $services->tasty_offer_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="tasty_offer_color" id="tasty_offer_color" class="form-control color-text"
                                value="{{ old('tasty_offer_color', $services->tasty_offer_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Title</label>
                            <input type="text" name="tasty_title" class="form-control"
                                value="{{ old('tasty_title', $services->tasty_title ?? '') }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Offer Text</label>
                            <input type="text" name="tasty_offer_text" class="form-control"
                                value="{{ old('tasty_offer_text', $services->tasty_offer_text ?? '') }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Image</label>
                            <input type="file" name="tasty_image" class="form-control mb-2">

                            @if(!empty($services->tasty_image))
                                <div class="mt-2">
                                    <p class="mb-1" style="font-size: 12px; color: #6c757d;">Testy Current Image:</p>
                                    <img src="{{ asset('uploads/services/' . $services->tasty_image) }}"
                                        alt="tasty Image"
                                        style="max-width: 150px; max-height: 150px; object-fit: cover; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label" style="font-size: 15px; font-weight: 400;">Testy Link</label>
                            <input type="text" name="tasty_link" class="form-control"
                                value="{{ old('tasty_link', $services->tasty_link ?? '') }}">
                        </div>




                    </div>

                    </hr>

               <h4 class=" p-3 text-dark fw-bold">Exotic Fruits</h4>

             <div class="row p-4">
                   <!-- 1. Exotic BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <!-- class পরিবর্তন করে color-picker করা হয়েছে -->
                                <input type="color" id="exotic_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('exotic_bg_color', $services->exotic_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <!-- class পরিবর্তন করে color-text করা হয়েছে -->
                            <input type="text" name="exotic_bg_color" id="exotic_bg_color" class="form-control color-text"
                                value="{{ old('exotic_bg_color', $services->exotic_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 2. Exotic Content BG Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Content BG Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="exotic_content_bg_color_picker" class="form-control color-picker"
                                    value="{{ old('exotic_content_bg_color', $services->exotic_content_bg_color ?? '#ffffff') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="exotic_content_bg_color" id="exotic_content_bg_color" class="form-control color-text"
                                value="{{ old('exotic_content_bg_color', $services->exotic_content_bg_color ?? '#ffffff') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#ffffff">
                        </div>
                    </div>

                    <!-- 3. Exotic Title Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Title Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="exotic_title_color_picker" class="form-control color-picker"
                                    value="{{ old('exotic_title_color', $services->exotic_title_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="exotic_title_color" id="exotic_title_color" class="form-control color-text"
                                value="{{ old('exotic_title_color', $services->exotic_title_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>

                    <!-- 4. Exotic Offer Color -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Offer Color</label>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid #ced4da; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <input type="color" id="exotic_offer_color_picker" class="form-control color-picker"
                                    value="{{ old('exotic_offer_color', $services->exotic_offer_color ?? '#000000') }}"
                                    title="Choose your color"
                                    style="width: 140%; height: 140%; transform: translate(-15%, -15%); border: none; padding: 0; cursor: pointer;">
                            </div>
                            <input type="text" name="exotic_offer_color" id="exotic_offer_color" class="form-control color-text"
                                value="{{ old('exotic_offer_color', $services->exotic_offer_color ?? '#000000') }}"
                                style="height: 45px; font-weight: 500;" placeholder="#000000">
                        </div>
                    </div>


                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Title</label>
                        <input type="text" name="exotic_title" class="form-control"
                            value="{{ old('exotic_title', $services->exotic_title ?? '') }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Offer Text</label>
                        <input type="text" name="exotic_offer_text" class="form-control"
                            value="{{ old('exotic_offer_text', $services->exotic_offer_text ?? '') }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Image</label>
                        <input type="file" name="exotic_image" class="form-control mb-2">

                        @if(!empty($services->exotic_image))
                            <div class="mt-2">
                                <p class="mb-1" style="font-size: 12px; color: #6c757d;">Exotic Current Image:</p>
                                <img src="{{ asset('uploads/services/' . $services->exotic_image) }}"
                                    alt="Exotic Image"
                                    style="max-width: 150px; max-height: 150px; object-fit: cover; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label" style="font-size: 15px; font-weight: 400;">Exotic Link</label>
                        <input type="text" name="exotic_link" class="form-control"
                            value="{{ old('exotic_link', $services->exotic_link ?? '') }}">
                    </div>




                </div>


                <div style="position: sticky; bottom: 20px; text-align: right; margin-top: 20px; z-index: 1050; pointer-events: none;">
                    <button type="submit" class="btn btn-primary px-4 m-3" style="font-size: 15px; font-weight: 400; box-shadow: 0px 4px 15px rgba(0,0,0,0.2); border-radius: 30px; padding: 10px 25px; pointer-events: auto;">
                        Update Services
                    </button>
                </div>


            </form>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {


        document.querySelectorAll('.color-picker').forEach(function (picker) {
            picker.addEventListener('input', function () {
                var targetTextId = this.id.replace('_picker', '');
                var textField = document.getElementById(targetTextId);
                if (textField) {
                    textField.value = this.value.toUpperCase();
                }
            });
        });

        document.querySelectorAll('.color-text').forEach(function (textInput) {
            textInput.addEventListener('input', function () {
                var targetPickerId = this.id + '_picker';
                var pickerField = document.getElementById(targetPickerId);

                var value = this.value;

                if (value && !value.startsWith('#')) {
                    value = '#' + value;
                    this.value = value;
                }

                var hexPattern = /^#([0-9a-fA-F]{3}){1,2}$/;
                if (pickerField && hexPattern.test(value)) {
                    pickerField.value = value;
                }
            });
        });

    });

</script>

@endsection
