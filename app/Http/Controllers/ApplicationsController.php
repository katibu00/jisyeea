<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionUser;
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

        $collections = Collection::where('status','active')->get();

        return view('admin.applications.index', [
            'applications' => $applications,
            'programs' => $programs,
            'collections' => $collections,
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
        $collections = Collection::where('status','active')->get();

        return view('admin.applications.show', ['application' => $application, 'collections' => $collections]);
    }

    public function addUserToCollection(Request $request)
    {
        $collectionId = $request->input('collection_id');
        $userId = $request->input('user_id');
    
        $collection = Collection::find($collectionId);
    
        if (!$collection) {
            return redirect()->back()->with('error', 'Collection not found');
        }
    
        $maxUsers = $collection->max_users;
        if ($maxUsers !== null && $maxUsers !== 0) {
            $currentUsersCount = $collection->users()->count();
            if ($currentUsersCount >= $maxUsers) {
                return redirect()->back()->with('error', 'Maximum number of users in the collection has been reached');
            }
        }
    
        if ($collection->users()->where('users.id', $userId)->exists()) {
            return redirect()->back()->with('error', 'User is already in the collection');
        }
    
        $collection->users()->attach($userId);
    
        return redirect()->back()->with('success', 'User added to the collection successfully');
    }
    

    public function bulkAction(Request $request)
    {
        $bulkAction = $request->input('bulk-action');
        $selectedApplications = $request->input('selectedApplications');
    
        if (!$selectedApplications) {
            return redirect()->back()->with('error', 'No applications selected for bulk action.');
        }
    
        // Check if the bulk action is to add to a collection
        if (strpos($bulkAction, 'add_to_collection_') !== false) {
            $collectionId = str_replace('add_to_collection_', '', $bulkAction);
    
            // Initialize counters
            $usersAdded = 0;
            $usersSkipped = 0;
    
            // Add selected applications to the specified collection
            foreach ($selectedApplications as $applicationId) {
                $result = $this->addUserToCollectionTwo($collectionId, $applicationId);
                if ($result === 'added') {
                    $usersAdded++;
                } elseif ($result === 'skipped') {
                    $usersSkipped++;
                }
            }
    
            // Construct success message
            $successMessage = 'Bulk action successfully applied.';
    
            if ($usersAdded > 0) {
                $successMessage .= " $usersAdded user(s) added to the collection.";
            }
    
            if ($usersSkipped > 0) {
                $successMessage .= " $usersSkipped user(s) skipped (already in the collection).";
            }
    
            return redirect()->back()->with('success', $successMessage);
        }
    
        // Remaining bulk action logic...
    
        return redirect()->back()->with('success', 'Bulk action successfully applied.');
    }
    
   
    public function addUserToCollectionTwo($collectionId, $userId)
    {
        $collection = Collection::find($collectionId);
    
        if (!$collection) {
            return 'skipped';
        }
    
        if ($collection->users()->where('users.id', $userId)->exists()) {
            return 'skipped';
        }
    
        $maxUsers = $collection->max_users;
        if ($maxUsers !== null && $maxUsers !== 0) {
            $currentUsersCount = $collection->users()->count();
            if ($currentUsersCount >= $maxUsers) {
                return 'skipped';
            }
        }
    
        $collection->users()->attach($userId);
    
        return 'added';
    }
    
    


    


    
}
