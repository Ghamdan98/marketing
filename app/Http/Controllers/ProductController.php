<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = product::with('category')->get();
        $categories = category::all();
        return view('admin.products.index', compact('products','categories'));
    }

    public function shop()
    {
        $category = category::all();
        $product = product::with('category')->get();
        return view('/product', compact('product', 'category'));
    }

    public function show_cate_product(string $id)
    {
        $category = category::all();
        $product = product::where('category_id', $id)->get();
        return view('/product', compact('product', 'category'));
    }
    /* desplay products*/

    public function product_desplay()
    {
        $product = product::with('category')->get();
        return view('home', compact('product'));
    }

    public function search_product(Request $request)
    {
        $category = category::all();
        $search = $request->search;
        $product = product::where('name', 'like', "%{$search}%")->get();
        return view('/product', compact('product', 'category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "name" => "required|string",
            "slug" => "required|string",
            "price" => "required|numeric",
            "sele_price" => "required|numeric",
            "quantity" => "required|integer",
            "description" => "nullable|string",
            "image" => "nullable|image|max:2048",
            "category_id" => "required|exists:categories,id"
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
        }
        product::create([
            "name" => $validated['name'],
            "slug" => $validated['slug'],
            "price" => $validated['price'],
            "sele_price" => $validated['sele_price'],
            "quantity"  => $validated['quantity'],
            "description" => $validated['description'],
            "image" => $imagePath,
            "category_id" => $validated['category_id'],
        ]);

        return redirect()->route("products.index")->with('success', "add product is successfly");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = product::findOrFail($id);
        $categories = category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            "name" => "required|string",
            // "slug" => "required|string",
            "price" => "required|numeric",
            "sele_price" => "required|numeric",
            "quantity" => "required|integer",
            "description" => "nullable|string",
            "image" => "nullable|image|max:2048",
            "category_id" => "required|exists:categories,id"
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $validated['name'],
            // 'slug' => $validated['slug'],
            'price' => $validated['price'],
            'sele_price' => $validated['sele_price'],
            'quantity' => $validated['quantity'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'category_id' => $validated['category_id'],
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Successfully updated product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = product::findOrFail($id);
        $product->delete();
        return back();
    }
}
