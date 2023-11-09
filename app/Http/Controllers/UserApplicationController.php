<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\PreRegistration;
use App\Models\Program;
use App\Models\User;
use App\Models\UserResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($request->has('program')) {
            $slug = $request->input('program');
            $program = Program::where('slug', $slug)->with('category')->first();
            $user = Auth::user();

            if ($program) {

                $preRegistration = $user->preRegistration;

                if (!$preRegistration) {
                    return redirect()->back()->with('error', 'You must fill the pre-registration form first.');
                }

                if (
                    $program->lga_origin !== 'all' &&
                    $preRegistration->lga_origin !== $program->lga_origin
                ) {
                    return redirect()->back()->with('error', 'Eligibility requirements are not met.');
                }

                if (
                    $program->category_interest !== 'all' &&
                    $preRegistration->preferred_category !== $program->category_interest
                ) {
                    return redirect()->back()->with('error', 'Eligibility requirements are not met.');
                }

                if (
                    $program->gender !== 'all' &&
                    $preRegistration->gender !== $program->gender
                ) {
                    return redirect()->back()->with('error', 'Eligibility requirements are not met.');
                }

                if (
                    $program->education_level !== 'all' &&
                    $preRegistration->education_level !== $program->education_level
                ) {
                    return redirect()->back()->with('error', 'Eligibility requirements are not met.');
                }
            }
        }

        if ($program->max_applicants !== null && $program->max_applicants !== 0) {
            $responseCount = UserResponse::where('program_id', $program->id)
                ->groupBy('user_id')
                ->distinct()
                ->count();

            if ($responseCount >= $program->max_applicants) {
                return redirect()->back()->with('message', 'Maximum number of required applicants met.');
            }
        }
        if ($program->max_age !== null && $program->max_age > 0) {
            $userDateOfBirth = Carbon::parse($preRegistration->date_of_birth);
            $userAge = $userDateOfBirth->age;

            if ($userAge > $program->max_age) {
                return redirect()->route('regular.home')->with('error', 'Eligibility requirements are not met.');
            }
        }

        $currentDate = now();
        $programs = Program::with('category')->get();

        if ($program) {
            if ($currentDate < $program->start_date) {
                return redirect()->route('regular.home')->with('error', 'The program has not started yet.');
            } elseif ($currentDate > $program->end_date) {
                return redirect()->route('regular.home')->with('error', 'The program has ended.');
            }
        }

        return view('user.apply', compact('program', 'programs'));
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

    public function storeUserResponse(Request $request)
    {
        $user = auth()->user();

        foreach ($request->all() as $field => $response) {

            if (strpos($field, 'question_') === 0) {
                $questionId = substr($field, 9);

                UserResponse::create([
                    'user_id' => $user->id,
                    'program_id' => $request->program_id,
                    'question_id' => $questionId,
                    'response' => $response,
                ]);
            }
        }

        return redirect()->route('thank-you');
    }

    public function showDetails($slug)
    {
        $program = Program::where('slug', $slug)->with('category')->first();
        return view('user.program_details', compact('program'));
    }

}
