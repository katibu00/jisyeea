<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserApplicationController extends Controller
{
    public function submit(Request $request)
    {

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

    public function index()
    {
        return view('user.apply');
    }

    public function applicationList()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();

        return view('user.application_list', compact('applications'));
    }


    public function downloadAcknowledgment($id)
    {
        // Find the application by ID
        $application = Application::find($id);

        if (!$application) {
            abort(404); // Or handle not found application appropriately
        }

        // Generate the PDF content using laravel-dompdf
        $pdf = Pdf::loadView('pdf.acknowledgment', compact('application'));

        // Set the filename for the downloaded file
        $filename = 'acknowledgment_' . $application->id . '.pdf';

        // Return the PDF file as a download response with appropriate headers
        return $pdf->download($filename);
    }
}
