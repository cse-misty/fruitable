<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\FaqCatagory;
use App\Repositories\FaqRepository;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    protected $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function index(Request $request)
    {
        $faqs = $this->faqRepository->all($request->search);
        $faqCategories = FaqCatagory::all();

        return view('backend.admin.faq.index', compact('faqs', 'faqCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faqCategories = FaqCatagory::all();
        return view('backend.admin.faq.create', compact('faqCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{

    $request->validate([
        'question' => 'required|string',
        'answer'   => 'required|string',
        'faq_category_id' => 'required|exists:faq_catagories,id',
        'position' => 'nullable|integer',
        'status' => 'required',
    ]);

    $this->faqRepository->store([
        'question' => $request->question,
        'answer'   => $request->answer,
        'faq_category_id' => $request->faq_category_id,
        'status' => $request->status,
        'position' => $request->position,
    ]);

    Alert::success('Success', 'FAQ Created Successfully');

    return redirect()->route('faq.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $faq = $this->faqRepository->findById($id);
    $faqCategories = FaqCatagory::all();

    return view('backend.admin.faq.edit', compact('faq', 'faqCategories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
          $request->validate([
        'question' => 'required|string',
        'answer'   => 'required|string',
        'faq_category_id' => 'required|exists:faq_catagories,id',
        'position' => 'nullable|integer',
        'status' => 'required',
    ]);

        $this->faqRepository->update($id, [
            'question' => $request->question,
            'answer'   => $request->answer,
            'faq_category_id' => $request->faq_category_id,
            'status' => $request->status,
            'position' => $request->position,
        ]);
        Alert::success('Success', 'Faq Updated Successfully');

        return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $this->faqRepository->delete($id);
        Alert::success('Success', 'Faq Deleted Successfully');

        return redirect()->route('faq.index');
    }
}
