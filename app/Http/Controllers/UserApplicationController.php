<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserApplicationController extends Controller
{
    public function submit(Request $request)
    {
       
        $user = User::find(Auth::user()->id);
    
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
            'nin' => 'nullable|string|max:256',
            'voter' => 'nullable|string|max:256',
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
        $application->nin = $validatedData['nin'];
        $application->voter = $validatedData['voter'];



        if ($request->file('profile-picture') != null) {
            $file = $request->file('profile-picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $user->picture = $filename;
            $user->save();
        }

        if ($request->file('cv-upload') != null) {
            $file = $request->file('cv-upload');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $application->cv_upload = $filename;
        }
        if ($request->file('nysc-certificate-upload') != null) {
            $file = $request->file('nysc-certificate-upload');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $application->nysc_certificate_upload = $filename;
        }
        if ($request->file('other-uploads') != null) {
            $file = $request->file('other-uploads');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $application->other_uploads = $filename;
        }


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

    public function index(Request $request)
    {
        $program = null;
        $programs = Program::with('category')->get();
        $categories = ProgramCategory::all();
    
        if ($request->has('program')) {
            $slug = $request->input('program');
            $program = Program::where('slug', $slug)->with('category')->first();
        }
        if ($program) {
            $currentDate = now();
            
            if ($currentDate < $program->start_date) {
                return redirect()->route('regular.home')->with('error', 'The program has not started yet.');
            } elseif ($currentDate > $program->end_date) {
                return redirect()->route('regular.home')->with('error', 'The program has ended.');
            }
        }
        return view('user.apply', compact('program', 'programs', 'categories'));
    }

    public function getProgramsByCategory($categoryId)
{
    // Fetch programs based on the category ID
    $programs = Program::where('category_id', $categoryId)->get();

    // Return the programs as JSON
    return response()->json($programs);
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
