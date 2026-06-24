<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {

        $query = Product::with('category', 'subCategory');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(10);



        return view('backend.admin.products.index', compact('products',));
    }

    public function create()
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();

        return view('backend.admin.products.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'price'           => 'required|numeric',
            'priority'        => 'required|integer',
            'status'          => 'required|boolean',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'     => 'nullable|string',
            'sold_count'      => 'nullable|integer',
            'rating'          => 'nullable|numeric|between:0,5',
        ]);

        $this->productRepository->store($validated, $request);
       Alert::success('Success', 'Sub Category created successfully!')
        ->toast()
        ->position('top-end');

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        $subCategories = SubCategory::all();

        return view('backend.admin.products.show', compact('product', 'subCategories'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('backend.admin.products.edit', compact('product', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'            => 'nullable|string|max:255',
            'category_id'     => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'price'           => 'nullable|numeric',
            'priority'        => 'nullable|integer',
            'status'          => 'nullable|boolean',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'     => 'nullable|string',
            'sold_count'      => 'nullable|integer',
            'rating'          => 'nullable|numeric|between:0,5',
        ]);

        $product = $this->productRepository->find($id);
        $this->productRepository->update($product, $validated, $request);

       Alert::success('Success', 'Sub Category created successfully!')
        ->toast()
        ->position('top-end');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
       Alert::success('Success', 'Sub Category created successfully!')
        ->toast()
        ->position('top-end');
        return redirect()->route('products.index');
    }

    public function toggleStatus(Product $product)
    {
        $product->status = !$product->status;
        $product->save();

        Alert::success('Success', 'Sub Category created successfully!')
        ->toast()
        ->position('top-end');
        return redirect()->route('products.index');
    }
}
