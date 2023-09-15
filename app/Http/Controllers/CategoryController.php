<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // if ($categories->isEmpty()) {
        //     $route = route('categories.create');
        //     return redirect()->route('dashboard.home')->with(['warning' => 'No categories yet! to add new click', 'route' => $route]);
        // }

        return view('dashboard.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Category::create($data);
        return  redirect()->route('categories.index')->with('status', 'Category successfully created');
    }

    public function edit(Category $category)
    {

        return view('dashboard.admin.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);


        $category->update($data);
        return redirect()->route('categories.index')->with('status', 'Category successfully Updated.');
    }
    public function show(Category $category)
    {
        return view('dashboard.admin.categories.show', compact('category'));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category successfully deleted.');
    }
}
