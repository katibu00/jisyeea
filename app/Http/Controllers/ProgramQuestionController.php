<?php

namespace App\Http\Controllers;

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
            'program_id' => 'required|exists:programs,id', // Validate that program_id exists
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

        return redirect()->route('form-questions.index')->with('success', 'Form question added successfully.');
    }
   

}
