<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserApplicationController extends Controller
{
    public function submit(Request $request)
    {
        //    return $request->all();

        // Check if the user has already submitted an application
        $user = Auth::user();
    
        if ($user->application) {
            return response()->json(['error' => 'User already has an application'], 400);
        }

        // Validate the form data
        $validatedData = $request->validate([
            'full-name' => 'required',
            'date-of-birth' => 'required|date',
            'gender' => 'required',
            'contact-number' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'lga-origin' => 'required',
            'ward' => 'required',
            'marital-status' => 'required',
            'highest-education' => 'required',
            'institution-of-study' => 'nullable',
            'area-of-study' => 'nullable',
            'artisan-skills' => 'required',
            'computer-skills' => 'required',
            'category' => 'required',
            'programs' => 'required',
        ]);

        // Create a new application
        $application = new Application();
        $application->user_id = Auth::id();
        $application->application_number = $this->generateApplicationNumber();

        // Set the application data
        $application->full_name = $validatedData['full-name'];
        $application->date_of_birth = $validatedData['date-of-birth'];
        $application->gender = $validatedData['gender'];
        $application->contact_number = $validatedData['contact-number'];
        $application->address = $validatedData['address'];
        $application->email = $validatedData['email'];
        $application->lga_origin = $validatedData['lga-origin'];
        $application->ward = $validatedData['ward'];
        $application->marital_status = $validatedData['marital-status'];
        $application->highest_education = $validatedData['highest-education'];
        $application->institution_of_study = $validatedData['institution-of-study'];
        $application->area_of_study = $validatedData['area-of-study'];
        $application->artisan_skills = $validatedData['artisan-skills'];
        $application->computer_skills = $validatedData['computer-skills'];
        $application->category = $validatedData['category'];
        $application->programs = $validatedData['programs'];

        // Save the application
        $application->save();

        return response()->json(['success' => 'Application submitted successfully.']);
    }

    private function generateApplicationNumber()
    {
        $timestamp = now()->format('YmdHis');
        $applicationNumber = 'YEEA-' . $timestamp;
        return $applicationNumber;
    }

}
