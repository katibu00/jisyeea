<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    public function create()
    {
        $categories = ProgramCategory::all();
        return view('admin.programs.program.create',  compact('categories'));
    }

    public function index()
    {
       $programs = Program::all();

        return view('admin.programs.program.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       $program = new Program();
       $program->title = $request->input('title');
       $program->description = $request->input('description');
       $program->category_id = $request->input('category_id');

        if ($request->file('featured_image') != null) {
            $destination = 'uploads/';
            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($destination, $filename);
           $program->featured_image = $destination . $filename;
        }


       $program->save();

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit($id)
    {
       $program = Program::findOrFail($id);
        return view('admin.programs.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       $program = Program::findOrFail($id);
       $program->title = $request->input('title');
       $program->description = $request->input('description');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/' . $imageName;
            $image->move(public_path('uploads'), $imageName);
           $program->featured_image = $imagePath;
        }
        $program->is_open = $request->has('active');
       $program->save();

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
       $program = Program::findOrFail($id);

        // Delete the featured image if it exists
        if ($program->featured_image) {
            Storage::delete($program->featured_image);
        }

       $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }


    public function show($id)
    {
       $program = Program::findOrFail($id);
       $allprograms = Program::where('id', '!=', $program->id)->get();
        return view('front.pages.program_details', compact('program','allprograms'));
    }


    public function allPrograms()
    {
        $categories = ProgramCategory::with('programs')->get();
        return view('front.pages.programs', compact('categories'));

    }
}
