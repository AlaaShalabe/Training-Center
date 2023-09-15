<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        // if ($categories->isEmpty()) {
        //     $route = route('specialties.create');
        //     return redirect()->route('dashboard.home')->with(['warning' => 'No specialties yet! to add new click', 'route' => $route]);
        // }

        return view('dashboard.admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'maximum' => 'required|numeric',
            'minimum' => 'required|numeric',
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images/course', $imageName, 'public');
        }

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'maximum' => $request->maximum,
            'minimum' => $request->minimum,
            'image' => $path
        ]);
        return  redirect()->route('courses.index')->with('status', 'Course successfully created');
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('dashboard.admin.courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric|min:0',
            'category_id' => 'exists:categories,id',
            'maximum' => 'numeric',
            'minimum' => 'numeric',
            'image' => 'image'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            Storage::disk('public')->delete('images/course' . $course->image);
            $newImage = $request->file('image');
            $newImageName = time() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('images/course', $newImageName, 'public');
            $data['image'] = $newImageName;
        }

        $course->update($data);

        return redirect()->route('courses.index')->with('status', 'course successfully Updated.');
    }

    public function show(Course $course)
    {
        return view('dashboard.admin.courses.show', compact('course'));
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('status', 'course successfully deleted.');
    }
}
