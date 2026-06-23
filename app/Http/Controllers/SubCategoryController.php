<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Repositories\SubCategoryRepository;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subCategories = $this->subCategoryRepository->getAll();
        return view('backend.admin.subCategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.admin.subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'slug' => 'required|unique:sub_categories',
        'image' => 'required|image',
        'priority' => 'required',
    ]);

    $data = $request->only([
        'category_id',
        'title',
        'slug',
        'status',
        'priority'
    ]);

    // IMAGE UPLOAD FIX
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/subcategory'), $filename);
        $data['image'] = $filename;
    }

    $this->subCategoryRepository->create($data);

   Alert::success('Success', 'Sub Category created successfully!')
        ->toast()
        ->position('top-end');

    return redirect()->route('sub-category.index');
}

    /**
     * Show the form for editing the specified resource.
     */

       public function show($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);
        $categories = Category::all();

        return view('backend.admin.subCategory.index', compact('subCategory','categories'));
    }
    public function edit($id)
    {
        $subCategory = $this->subCategoryRepository->find($id);
        $categories = Category::all();

        return view('backend.admin.subCategory.edit', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, $id)
{

    $request->validate([
        'category_id' => 'required',
        'title'       => 'required',
        'slug'        => 'required|unique:sub_categories,slug,' . $id,
        'status'      => 'required',
        'priority'    => 'nullable|numeric',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


    $subCategory = $this->subCategoryRepository->find($id);


    $data = $request->only([
        'category_id',
        'title',
        'slug',
        'status',
        'priority'
    ]);

    if ($request->hasFile('image')) {

        $oldImagePath = public_path('uploads/subcategory/' . $subCategory->image);
        if ($subCategory->image && File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }


        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/subcategory'), $filename);
        $data['image'] = $filename;
    }


    $this->subCategoryRepository->update($id, $data);


    Alert::info('Updated', 'Sub Category updated successfully!')
        ->toast()
        ->position('top-end');

    return redirect()->route('sub-category.index');
}
    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $this->subCategoryRepository->delete($id);
    Alert::warning('Deleted', 'Sub Category deleted successfully!')
        ->toast()
        ->position('top-end');

    return redirect()->back();
}
}
