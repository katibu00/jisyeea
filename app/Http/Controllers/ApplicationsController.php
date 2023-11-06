<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\Program;
use App\Models\ProgramCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $query = PreRegistration::query();

        if ($request->input()) {
            // Apply filters based on request input
            if ($request->has('lga-origin') && $request->input('lga-origin') !== null) {
                $lgaOrigin = $request->input('lga-origin');
                $query->where('lga_origin', $lgaOrigin);
            }

            if ($request->has('ward') && $request->input('ward') !== null) {
                $ward = $request->input('ward');
                $query->where('ward', $ward);
            }

            if ($request->has('highest_education') && $request->input('highest_education') !== null) {
                $highestEducation = $request->input('highest_education');
                $query->where('highest_education', $highestEducation);
            }

            if ($request->has('gender') && $request->input('gender') !== null) {
                $gender = $request->input('gender');
                $query->where('gender', $gender);
            }

            if ($request->has('program') && $request->input('program') !== null) {
                $program = $request->input('program');
                $query->where('preferred_category', $program);
            }

            if ($request->has('max-age') && $request->input('max-age') !== null) {
                $maxAge = $request->input('max-age');
                $birthDate = Carbon::now()->subYears($maxAge)->format('Y-m-d');
                $query->whereDate('date_of_birth', '<=', $birthDate);
            }
            if ($request->has('area_of_study') && $request->input('area_of_study') !== null) {
                $areaOfStudy = $request->input('area_of_study');
                $query->where('area_of_study', 'LIKE', "%$areaOfStudy%");
            }


            $applications = $query->get();
        } else {
            $applications = collect();
        }

        $programs = ProgramCategory::all();

        return view('admin.applications.index', [
            'applications' => $applications,
            'programs' => $programs,
            'selectedLga' => $request->input('lga-origin'),
            'selectedWard' => $request->input('ward'),
            'selectedHighestEducation' => $request->input('highest_education'),
            'selectedGender' => $request->input('gender'),
            'selectedProgram' => $request->input('program'),
            'max_age' => $request->input('max-age'),
            'area_of_study' => $request->input('area_of_study'),
        ]);

    }

    public function show($id)
    {
        $application = PreRegistration::with('user')->find($id);

        if (!$application) {
            return redirect()->route('applications.index')->with('error', 'Application not found.');
        }

        return view('admin.applications.show', ['application' => $application]);
    }

    public function bulkAction(Request $request)
    {
        $bulkAction = $request->input('bulk-action');
        // dd($request->all());
        $selectedApplications = $request->input('selectedApplications');

        if (!$selectedApplications) {
            return redirect()->back()->with('error', 'No applications selected for bulk action.');
        }

        $newStatus = '';
        switch ($bulkAction) {
            case 'approve':
                $newStatus = 'approved';
                break;
            case 'list':
                $newStatus = 'listed';
                break;
            case 'reject':
                $newStatus = 'rejected';
                break;
            default:
                return redirect()->back()->with('error', 'Invalid bulk action selected.');
        }

        PreRegistration::whereIn('id', $selectedApplications)->update(['status' => $newStatus]);

        return redirect()->back()->with('success', 'Bulk action successfully applied.');
    }

}
