<?php

namespace App\Http\Controllers;

use App\Models\FaqCatagory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\FaqCatagoryRepository;
use Illuminate\Support\Str;

class FaqCatagoryController extends Controller
{
    protected $faqCatagoryRepository;

    public function __construct(FaqCatagoryRepository $faqCatagoryRepository)
    {
        $this->faqCatagoryRepository = $faqCatagoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $faqCatagories = $this->faqCatagoryRepository->all($request->search);

    return view('backend.admin.faqCatagory.index', compact('faqCatagories')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.faqCatagory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{


    $request->validate([
        'name' => 'required|string|max:255',
         'slug'   => 'required|string|max:255',
        'status' => 'required',
    ]);


    $this->faqCatagoryRepository->store([
        'name' => $request->name,
        'slug'   => Str::slug($request->name),
        'status' => $request->status,
    ]);
    Alert::success('Success', 'Category Created Successfully');

    return redirect()->route('faq.catagory.index');

}

    /**
     * Display the specified resource.
     */
    public function show(FaqCatagory $faqCatagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $faqCatagory = $this->faqCatagoryRepository->findById($id);
        return view('backend.admin.faqCatagory.edit', compact('faqCatagory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
             'slug'   => 'nullable|string|max:255',
            'status' => 'nullable',
        ]);

        $this->faqCatagoryRepository->update($id, [
            'name' => $request->name,
            'slug'   => Str::slug($request->name),
            'status' => $request->status,
        ]);
        Alert::success('Success', 'Category Updated Successfully');

        return redirect()->route('faq.catagory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->faqCatagoryRepository->delete($id);
        Alert::success('Success', 'Category Deleted Successfully');

        return redirect()->route('faq.catagory.index');
    }
}
