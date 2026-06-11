<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       public function __construct(
        protected CategoryRepository $repository,
        protected CategoryService $service
    ) {}
    public function index(Request $request)
        {
            $query = Category::query();

            if ($request->search) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            $categories = $query->latest()->paginate(4);

            return view('backend.admin.categories.index', compact('categories'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = $request->validated();

        if ($request->hasFile('image')) {

            $images = $this->service
                ->uploadImage($request->image);

            $category['image'] = $images['image'];

            $category['thumbnail'] = $images['thumbnail'];
        }

        $this->repository->store($category);
        Alert::success('Success ', 'Category created successfully!.');

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $category = $this->repository->find($id);

        return view('backend.admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);


        return view('backend.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = $this->repository->find($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {

            $images = $this->service
                ->uploadImage($request->image);

            $data['image'] = $images['image'];

            $data['thumbnail'] = $images['thumbnail'];
        }

        $this->repository->update($category, $data);

         Alert::success('Success ', 'Category Update successfully!.');

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->repository->find($id);

        $this->repository->delete($category);

        Alert::success('Success ', 'Category deleted successfully.');

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function toggleStatus(Category $category)
    {

        $category->status = !$category->status;
        $category->save();

        return redirect()->back()->with('success', __('Category status updated successfully!'));
    }
}
