<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'parent_id' => 'nullable|exists:categories,id',
    ]);

    $category = new Category();
    $category->name = $validatedData['name'];
    $category->parent_id = $validatedData['parent_id'];

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('category_images', 'public');
        $category->image = $imagePath;
    }

    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category created successfully');
}


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
