<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreRegistrationController extends Controller
{
    // public function submit(Request $request)
    // {

    //     $user = User::find(Auth::user()->id);

    //     if ($user->application) {
    //         return response()->json(['error' => 'User already has an application'], 400);
    //     }

    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'full-name' => 'required',
    //         'date-of-birth' => 'required|date',
    //         'gender' => 'required',
    //         'contact-number' => 'required',
    //         'address' => 'required',
    //         'email' => 'required|email',
    //         'lga-origin' => 'required',
    //         'ward' => 'required',
    //         'marital-status' => 'required',
    //         'highest-education' => 'required',
    //         'institution-of-study' => 'nullable',
    //         'area-of-study' => 'nullable',
    //         'artisan-skills' => 'required',
    //         'computer-skills' => 'required',
    //         'category' => 'required',
    //         'programs' => 'required',
    //         'nin' => 'nullable|string|max:256',
    //         'voter' => 'nullable|string|max:256',
    //     ]);

    //     // Create a new application
    //     $application = new PreRegistration();
    //     $application->user_id = Auth::id();
    //     $application->application_number = $this->generateApplicationNumber();

    //     // Set the application data
    //     $application->full_name = $validatedData['full-name'];
    //     $application->date_of_birth = $validatedData['date-of-birth'];
    //     $application->gender = $validatedData['gender'];
    //     $application->contact_number = $validatedData['contact-number'];
    //     $application->address = $validatedData['address'];
    //     $application->email = $validatedData['email'];
    //     $application->lga_origin = $validatedData['lga-origin'];
    //     $application->ward = $validatedData['ward'];
    //     $application->marital_status = $validatedData['marital-status'];
    //     $application->highest_education = $validatedData['highest-education'];
    //     $application->institution_of_study = $validatedData['institution-of-study'];
    //     $application->area_of_study = $validatedData['area-of-study'];
    //     $application->artisan_skills = $validatedData['artisan-skills'];
    //     $application->computer_skills = $validatedData['computer-skills'];
    //     $application->category = $validatedData['category'];
    //     $application->programs = $validatedData['programs'];
    //     $application->nin = $validatedData['nin'];
    //     $application->voter = $validatedData['voter'];

    //     if ($request->file('profile-picture') != null) {
    //         $file = $request->file('profile-picture');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/', $filename);
    //         $user->picture = $filename;
    //         $user->save();
    //     }

    //     if ($request->file('cv-upload') != null) {
    //         $file = $request->file('cv-upload');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/', $filename);
    //         $application->cv_upload = $filename;
    //     }
    //     if ($request->file('nysc-certificate-upload') != null) {
    //         $file = $request->file('nysc-certificate-upload');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/', $filename);
    //         $application->nysc_certificate_upload = $filename;
    //     }
    //     if ($request->file('other-uploads') != null) {
    //         $file = $request->file('other-uploads');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move('uploads/', $filename);
    //         $application->other_uploads = $filename;
    //     }

    //     // Save the application
    //     $application->save();

    //     return response()->json(['success' => 'Application submitted successfully.']);
    // }

    public function submit(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->preRegistration) {
            return response()->json(['error' => 'User already has a pre-registration'], 400);
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
            'program-category' => 'required',
            'employment-status' => 'required',
            'business-name' => 'nullable',
            'business-type' => 'nullable',
            'student-details' => 'nullable',
            'job-title' => 'nullable',
            'company-name' => 'nullable',
            'cv-upload' => 'nullable|file',
            'nysc-certificate-upload' => 'nullable|file',
            'other-uploads' => 'nullable|file',
            'nin' => 'nullable|string|max:256',
            'voter' => 'nullable|string|max:256',
        ]);

        // Create a new pre-registration
        $preRegistration = new PreRegistration();
        $preRegistration->user_id = Auth::id();
        $preRegistration->yeea_number = $this->generateYeeaNumber();

        // Set the pre-registration data
        $preRegistration->full_name = $validatedData['full-name'];
        $preRegistration->date_of_birth = $validatedData['date-of-birth'];
        $preRegistration->gender = $validatedData['gender'];
        $preRegistration->contact_number = $validatedData['contact-number'];
        $preRegistration->address = $validatedData['address'];
        $preRegistration->email = $validatedData['email'];
        $preRegistration->lga_origin = $validatedData['lga-origin'];
        $preRegistration->ward = $validatedData['ward'];
        $preRegistration->marital_status = $validatedData['marital-status'];
        $preRegistration->highest_education = $validatedData['highest-education'];
        $preRegistration->institution_of_study = $validatedData['institution-of-study'];
        $preRegistration->area_of_study = $validatedData['area-of-study'];
        $preRegistration->artisan_skills = $validatedData['artisan-skills'];
        $preRegistration->computer_skills = $validatedData['computer-skills'];
        $preRegistration->preferred_category = $validatedData['program-category'];
        $preRegistration->employment_status = $validatedData['employment-status'];
        $preRegistration->business_name = $validatedData['business-name'];
        $preRegistration->business_type = $validatedData['business-type'];
        $preRegistration->student_details = $validatedData['student-details'];
        $preRegistration->job_title = $validatedData['job-title'];
        $preRegistration->company_name = $validatedData['company-name'];
        $preRegistration->nin = $validatedData['nin'];
        $preRegistration->voter = $validatedData['voter'];


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
            $preRegistration->cv_upload = $filename;
        }
        if ($request->file('nysc-certificate-upload') != null) {
            $file = $request->file('nysc-certificate-upload');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $preRegistration->nysc_certificate_upload = $filename;
        }
        if ($request->file('other-uploads') != null) {
            $file = $request->file('other-uploads');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $preRegistration->other_uploads = $filename;
        }

        $preRegistration->save();

        return response()->json(['success' => 'Pre-registration submitted successfully.']);
    }

    private function generateYeeaNumber()
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
        return view('user.pre_registration', compact('program', 'programs', 'categories'));
    }

}
