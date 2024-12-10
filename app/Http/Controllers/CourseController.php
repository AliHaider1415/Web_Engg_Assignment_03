<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course; // Import the Course model

class CourseController extends Controller
{


    // Display all courses (accessible only by admin)
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all(); // You can use paginate() if you want pagination

        // Pass courses to the view
        return view('courses.index', compact('courses'));
    }

    // Store a new course (accessible only by admin)
    public function store(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer',
        'level' => 'required|string',
        'price' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ]);

    // Create a new course
    try {
        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'level' => $validated['level'],
            'price' => $validated['price'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        // Flash success message and redirect back to course create page
        return redirect()->route('courses.create')->with('success', 'Course created successfully');
    } catch (\Exception $e) {
        // Flash error message and redirect back to course create page
        return redirect()->route('courses.create')->with('error', 'Failed to create course. ' . $e->getMessage());
    }
}

    // Update an existing course (accessible only by admin)
    public function edit(Request $request, $id)
{
    // Validate the incoming data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer',
        'level' => 'required|string',
        'price' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ]);

    try {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Update the course with the validated data
        $course->update($validated);

        // Flash success message to session
        session()->flash('success', 'Course updated successfully.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Flash error message to session
        session()->flash('error', 'Course not found.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    } catch (\Exception $e) {
        // Flash error message to session
        session()->flash('error', 'Failed to update course.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    }
}


    // Delete a course (accessible only by admin)
    public function destroy($id)
{
    try {
        // Find the course by ID
        $course = Course::findOrFail($id);

        // Delete the course
        $course->delete();

        // Flash success message to session
        session()->flash('success', 'Course deleted successfully.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Flash error message to session
        session()->flash('error', 'Course not found.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    } catch (\Exception $e) {
        // Flash error message to session
        session()->flash('error', 'Failed to delete course.');

        // Redirect back to courses page
        return redirect()->route('courses.index');
    }
}



}
