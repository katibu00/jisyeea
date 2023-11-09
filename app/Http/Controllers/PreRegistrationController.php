<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\ProgramCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PreRegistrationController extends Controller
{

    public function submit(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $preRegistration = PreRegistration::select('id')->where('user_id', $user->id)->first(); 
       
        if ($preRegistration) {
            return response()->json(['error' => 'User already has a pre-registration'], 400);
        }
        // Validate the form data
        $validatedData = $request->validate([
            'full-name' => 'required',
            'profile-picture' => 'required|image|max:500',
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
        $timestamp = now()->format('mdHis');
        $applicationNumber = 'YEEA-' . $timestamp;
        return $applicationNumber;
    }

    public function index(Request $request)
    {
        $categories = ProgramCategory::all();

        $preRegistration = PreRegistration::select('id','created_at','yeea_number')->where('user_id', auth()->user()->id)->first(); 

        return view('user.pre_registration', compact('categories','preRegistration'));
    }

    public function downloadAcknowledgment($id)
    {
        $preRegistration = PreRegistration::find($id);

        if (!$preRegistration) {
            abort(404);
        }

        $pdf = Pdf::loadView('pdf.acknowledgment', compact('preRegistration'));

        $filename = 'acknowledgment_' . $preRegistration->id . '.pdf';
        return $pdf->download($filename);
    }
}
