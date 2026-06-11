@extends('frontend.layouts')

@section('content')

<!-- Page Header -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">FAQ</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">FAQ</li>
    </ol>
</div>

<!-- FAQ Section -->
<section class="faq-section py-5">
    <div class="container">

        <!-- Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted">Find answers to the most common questions</p>
        </div>

        <!-- Category Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4 p-5">
        <!-- All Button -->
        <button class="btn btn-primary category-btn active"
                onclick="filterFaqs('all')">
            All Questions
        </button>

        <!-- Categories -->
        @foreach($faqCatagories as $category)
            <button class="btn border category-btn"
                    onclick="filterFaqs('{{ $category->id }}')">
                {{ $category->name }}
            </button>
        @endforeach

        </div>

        <!-- FAQ Accordion -->
        <div class="accordion shadow-sm" id="faqAccordion">

            <!-- FAQ 1 -->
          <div class="accordion shadow-sm" id="faqAccordion">

    @forelse($faqs as $key => $faq)

        <div class="accordion-item mb-3" data-category="{{ $faq->faq_category_id }}">

            <h2 class="accordion-header" id="faq{{ $key }}">

                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#c{{ $key }}">

                    <i class="bi bi-question-circle-fill text-primary p-2"></i>

                    <span>{{ $faq->question }}</span>

                </button>

            </h2>

            <div id="c{{ $key }}"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body">

                    {{ $faq->answer }}

                </div>

            </div>

        </div>

    @empty

        <div class="text-center text-muted p-4">
            No FAQ Found
        </div>

    @endforelse

</div>



        </div>

        <!-- Help Section -->
        <div class="text-center mt-5">

            <h2 class="pt-3">Still have questions?</h2>

            <p class="text-muted py-4">
                Can't find the answer you're looking for? Our customer support team is here to help.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-3">

                <a href="{{ route('index') }}"
                   class="btn btn-primary px-4 py-2">
                    Back To Home
                </a>

                <a href="{{ route('web.contact') }}"
                   class="btn btn-outline-primary px-4 py-2">
                    Contact Support
                </a>

            </div>
        </div>

    </div>
</section>

@endsection
<script>
function filterFaqs(categoryId) {

    let items = document.querySelectorAll('.accordion-item');

    items.forEach(item => {

        let itemCategory = item.getAttribute('data-category');

        if (categoryId === 'all') {
            item.style.display = 'block';
        }
        else if (itemCategory === categoryId) {
            item.style.display = 'block';
        }
        else {
            item.style.display = 'none';
        }

    });

}
</script>


