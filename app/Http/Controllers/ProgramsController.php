<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
       $categories = ProgramCategory::all();
        return view('admin.programs.program.index', compact('programs','categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'start_date' => 'required|date_format:m/d/Y', 
        'end_date' => 'required|date|after:start_date|date_format:m/d/Y',
        'max_applicants' => 'numeric|nullable',
        'max_age' => 'numeric|nullable',
        'education_level' => 'required',
        'gender' => 'required',
        'category_interest' => 'required',
        'lga_origin' => 'required',
    ]);

    $program = new Program();
    $program->title = $request->input('title');
    $program->slug = Str::slug($request->input('title'));
    $program->description = $request->input('description');
    $program->category_id = $request->input('category_id');
    $start_date = date('Y-m-d', strtotime($request->input('start_date'))); 
    $end_date = date('Y-m-d', strtotime($request->input('end_date'))); 
    $program->start_date = $start_date;
    $program->end_date = $end_date;
    $program->max_applicants = $request->input('max_applicants');
    $program->max_age = $request->input('max_age');
    $program->education_level = $request->input('education_level');
    $program->gender = $request->input('gender');
    $program->category_interest = $request->input('category_interest');
    $program->lga_origin = $request->input('lga_origin');

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
       $categories = ProgramCategory::all();
        return view('admin.programs.program.edit', compact('program','categories'));
    }

  
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'max_applicants' => 'nullable|numeric',
            'max_age' => 'nullable|numeric',
            'education_level' => 'required',
            'gender' => 'required',
            'category_interest' => 'required',
            'lga_origin' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $program->title = $request->input('title');
        $program->slug = Str::slug($request->input('title'));
        $program->description = $request->input('description');
        $program->category_id = $request->input('category_id');
        $program->start_date = $request->input('start_date');
        $program->end_date = $request->input('end_date');
        $program->max_applicants = $request->input('max_applicants');
        $program->max_age = $request->input('max_age');
        $program->education_level = $request->input('education_level');
        $program->gender = $request->input('gender');
        $program->category_interest = $request->input('category_interest');
        $program->lga_origin = $request->input('lga_origin');
    
        if ($request->file('featured_image') !== null) {
            $destination = 'uploads/';
            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($destination, $filename);
            $program->featured_image = $destination . $filename;
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


    public function show($slug)
    {
       $program = Program::where('slug',$slug)->first();
       $allprograms = Program::where('id', '!=', $program->id)->get();
        return view('front.pages.program_details', compact('program','allprograms'));
    }


    public function allPrograms()
    {
        $categories = ProgramCategory::with('programs')->get();
        return view('front.pages.programs', compact('categories'));

    }

    public function register($slug)
{
    if (auth()->check()) {
        // User is logged in, redirect to the application form with the program's slug
        return redirect()->route('apply', ['program' => $slug]);
    }

    // User is not logged in, redirect to the login page with a parameter indicating the target URL
    return redirect()->route('login', ['redirectTo' => 'apply', 'program' => $slug]);
}
}
