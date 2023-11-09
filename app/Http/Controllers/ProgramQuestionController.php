<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramQuestion;
use Illuminate\Http\Request;

class ProgramQuestionController extends Controller
{
    public function create(Request $request)
    {
        $programId = $request->query('program_id');
        return view('admin.programs.program.create_questions', compact('programId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'field_type' => 'required|in:text,number,textarea,select',
            'options' => 'nullable|required_if:field_type,select|string',
            'program_id' => 'required|exists:programs,id',
        ]);

        // Create a new ProgramQuestion instance
        $programQuestion = new ProgramQuestion([
            'question' => $request->input('question'),
            'field_type' => $request->input('field_type'),
        ]);

        // If it's a select field, save the options
        if ($request->input('field_type') === 'select') {
            $options = explode(',', $request->input('options')); 
            $programQuestion->options = $options; 
        }

        // Set the program_id based on the input
        $programQuestion->program_id = $request->input('program_id');

        // Save the question
        $programQuestion->save();

        return redirect()->route('form-questions.index', ['program_id' => $request->program_id])->with('success', 'Form question added successfully.');
    }
   

    public function index(Request $request)
    {
        // Get the program_id from the URL parameter
        $programId = $request->query('program_id');
        
        // Retrieve the questions associated with the program
        $questions = ProgramQuestion::where('program_id', $programId)->get();

        // Assuming you have a $program variable, you can use it for the program's title
        // You can retrieve the program by its ID
        $program = Program::find($programId);

        return view('admin.programs.program.questions_index', compact('questions', 'program'));
    }

}
