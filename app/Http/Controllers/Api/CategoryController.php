<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $categories = Category::latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'All Categories',
            'data' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'priority' => 'nullable|integer',

        ]);

        $category = Category::create([
            'image' => $request->image,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Category found',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{

    $request->validate([
        'image' => 'nullable',
        'title'       => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'status'      => 'nullable|string',
        'priority'    => 'nullable|integer',
    ]);


    $category = Category::find($id);


    if (!$category) {
        return response()->json([
            'status' => false,
            'message' => 'Category not found!'
        ], 404);
    }

    $category->image = $request->image;
    $category->title = $request->title;
    $category->description = $request->description;
    $category->status = $request->status;
    $category->priority = $request->priority;

    $category->save();

    return response()->json([
        'status' => true,
        'message' => 'Category updated successfully',
        'data' => $category
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
