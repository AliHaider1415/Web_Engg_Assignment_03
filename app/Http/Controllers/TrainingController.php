<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the trainings.
     */
    public function index()
    {
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new training.
     */
    public function create()
    {
        return view('trainings.create');
    }

    /**
     * Store a newly created training in storage.
     */
    public function store(Request $request)
    {
        // Validation based on the fields from the migration
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer' => 'required|string|max:255', // Trainer name or ID
            'fees' => 'required|numeric', // Fees for the training
            'duration' => 'required|string|max:255', // Duration in string format
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date', // End date must be after or equal to start date
            'mode' => 'required|in:online,offline,hybrid', // Mode of training (online, offline, hybrid)
            'location' => 'nullable|string|max:255', // Location is nullable for online or hybrid training
            'max_participants' => 'required|integer|min:1', // Ensure at least 1 participant
        ]);

        // Create the new training record in the database
        Training::create([
            'title' => $request->title,
            'description' => $request->description,
            'trainer' => $request->trainer,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'mode' => $request->mode,
            'location' => $request->location,
            'max_participants' => $request->max_participants,
        ]);

        // Redirect to the training list page with a success message
        return redirect()->route('trainings.index')->with('success', 'Training created successfully.');
    }

    /**
     * Show the form for editing the specified training.
     */
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified training in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation based on the fields from the migration
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'trainer' => 'required|string|max:255', // Trainer name or ID
            'fees' => 'required|numeric', // Fees for the training
            'duration' => 'required|string|max:255', // Duration in string format
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date', // End date must be after or equal to start date
            'mode' => 'required|in:online,offline,hybrid', // Mode of training (online, offline, hybrid)
            'location' => 'nullable|string|max:255', // Location is nullable for online or hybrid training
            'max_participants' => 'required|integer|min:1', // Ensure at least 1 participant
        ]);

        // Find the existing training record by ID
        $training = Training::findOrFail($id);

        // Update the training record with the validated data
        $training->update([
            'title' => $request->title,
            'description' => $request->description,
            'trainer' => $request->trainer,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'mode' => $request->mode,
            'location' => $request->location,
            'max_participants' => $request->max_participants,
        ]);

        // Redirect to the training list page with a success message
        return redirect()->route('trainings.index')->with('success', 'Training updated successfully.');
    }

    /**
     * Remove the specified training from storage.
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('trainings.index')->with('success', 'Training deleted successfully.');
    }
}
