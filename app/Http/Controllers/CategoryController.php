<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\storeCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['parent'])->paginate(10);
        $categoryName = Category::where('category_id', null)->get();


        return view('dashboard.category.show', compact('categories', 'categoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryName = Category::where('category_id', null)->get();

        return view('dashboard.category.add', compact('categoryName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(storeCategoryRequest $request)
    {
        $categories = Category::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);

        return response()->json($categories);
        // return redirect()->route('category.index')->with('success-message', 'add is succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $categories)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function edit(Category $category)
    {
        $categoryName = Category::where('category_id', null)->get();

        return view('dashboard.category.edit', compact('category', 'categoryName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $categoryDestroy = $category->delete();

        return response()->json($categoryDestroy);
        //        return redirect()->route('category.index')->with('success-message', 'deleted is successfully');
    }
}