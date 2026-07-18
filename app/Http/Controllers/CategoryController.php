<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $category = category::all();
    //     return view('admin.categories.index',compact('category'));
    // }
    public function index(Request $request)
    {
        $categories = Category::withCount('product')

            ->when($request->search, function ($query) use ($request) {

                $query->where('name', 'like', '%' . $request->search . '%');
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }
    public function shop()
    {
        $category = category::all();
        return view('/category', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "welcom";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "name"        => "required|string",
            "slug"        => "required|string",
            "description" => "nullable|string",
            "image"       => "image|nullable",
        ]);

        $imgePath = null;
        if ($request->hasFile('image')) {
            $imgePath = $request->file('image')->store('categories', 'public');
        }

        category::create([
            "name"        => $validated['name'],
            "slug"        => $validated['slug'],
            "description" => $validated['description'],
            "image"       => $imgePath,
        ]);
        return redirect()->route('category.index')->with('success', 'created seccessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('product')
            ->loadCount('product');

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = category::findOrFail($id);
        $validated = $request->validate([
            "name" => "required|string",
            "slug" => "required|string",
            "description" => "nullable|string",
            "image" => "nullable|image",
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }
        $category->update([
            "name" => $validated['name'],
            "slug" => $validated['slug'],
            "description" => $validated['description'],
            "image" => $imagePath

        ]);

        return redirect()->route('category.index')->with('success', "update is successfly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'successfly delete Item');
    }
}
