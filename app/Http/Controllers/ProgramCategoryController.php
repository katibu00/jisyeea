<?php

namespace App\Http\Controllers;

use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class ProgramCategoryController extends Controller
{
    public function index()
    {
        $programs = ProgramCategory::all();

        return view('admin.programs.categories.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new program instance
        $program = new ProgramCategory([
            'name' => $request->input('name'),
        ]);

        // Save the program to the database
        $program->save();

        return redirect()->route('programs.categories.index')->with('success', 'Program category created successfully.');
    }

    public function edit($id)
    {
        $program = ProgramCategory::findOrFail($id);
        return view('admin.programs.categories.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $program = ProgramCategory::findOrFail($id);
        $program->name = $request->input('name');
        $program->save();

        return redirect()->route('programs.categories.index')->with('success', 'Program category updated successfully.');
    }

    public function destroy($id)
    {
        $program = ProgramCategory::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.categories.index')->with('success', 'Program category deleted successfully.');
    }
}
