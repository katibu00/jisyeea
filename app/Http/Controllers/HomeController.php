<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Blog;
use App\Models\PopUpNotification;
use App\Models\PreRegistration;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function admin()
    {
        $totalRegularUserCount = User::where('user_type', 'regular')->count();
        $totalAdminUserCount = User::where('user_type', 'admin')->count();
        $totalProgramsCount = Program::where('is_open', true)->count();
        $totalBlogCount = Blog::count();
    
        $totalPreRegistrationCount = PreRegistration::count();
        $totalUsersWithoutPreRegistration = $totalRegularUserCount - $totalPreRegistrationCount;
    
        // Calculate user sign-ups over the last 15 days
        $endDate = now(); // Today's date
        $startDate = now()->subDays(14); // 15 days ago
    
        $dates = [];
        $userCounts = [];
    
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $day = $date->format('Y-m-d');
            $count = User::whereDate('created_at', $day)->count();
    
            $dates[] = $day;
            $userCounts[] = $count;
        }
    
        // Convert dates to JSON for use in JavaScript
        $datesJson = json_encode($dates);
        $userCountsJson = json_encode($userCounts);


        $lgaUserCounts = PreRegistration::select('lga_origin', DB::raw('count(*) as count'))
        ->groupBy('lga_origin')
        ->get();

        // Prepare data for the chart
        // $lgas = $lgaUserCounts->pluck('lga_origin')->toArray();
        // $userCounts = $lgaUserCounts->pluck('count')->toArray();

        $lgas = DB::table('pre_registrations')
        ->select('lga_origin', DB::raw('count(*) as count'))
        ->groupBy('lga_origin')
        ->get();
        $lgasArray = $lgas->toArray();

        $genderData = DB::table('pre_registrations')
        ->select('gender', DB::raw('count(*) as count'))
        ->groupBy('gender')
        ->get();

        $educationData = DB::table('pre_registrations')
        ->select('highest_education', DB::raw('count(*) as count'))
        ->groupBy('highest_education')
        ->get();

        $categoryData = DB::table('pre_registrations')
        ->join('program_categories', 'pre_registrations.preferred_category', '=', 'program_categories.id')
        ->select('program_categories.name as category_name', DB::raw('count(*) as count'))
        ->groupBy('category_name')
        ->get();
    
    
        return view('admin.home', [
            'totalRegularUserCount' => $totalRegularUserCount,
            'totalAdminUserCount' => $totalAdminUserCount,
            'totalProgramsCount' => $totalProgramsCount,
            'totalBlogCount' => $totalBlogCount,
            'totalPreRegistrationCount' => $totalPreRegistrationCount,
            'totalUsersWithoutPreRegistration' => $totalUsersWithoutPreRegistration,
            'datesJson' => $datesJson,
            'userCountsJson' => $userCountsJson,
            'lgasArray' => $lgasArray,
            'genderData' => $genderData,
            'educationData' => $educationData,
            'categoryData' => $categoryData,
        ]); 
    }
    

    public function guest()
    {
        $data['blogs'] = Blog::all();
        $data['programs'] = Program::all();
        $data['popUp'] = PopUpNotification::where('switch', 'on')->first();
        return view('front.pages.home', $data);
    }

    public function regular()
    {
        $user = Auth::user();

        $recentUpdates = Blog::latest()->limit(3)->get();

        // Get upcoming programs
        $programs = Program::all();

        foreach ($programs as &$program) {
            $startDate = Carbon::parse($program->start_date);
            $endDate = Carbon::parse($program->end_date);
            $now = Carbon::now();

            if ($now->lt($startDate)) {
                // Program is upcoming
                $program->status = 'Upcoming';
                $program->action = 'Apply Now';
            } elseif ($now->between($startDate, $endDate)) {
                // Program is ongoing
                $program->status = 'Ongoing';
                $program->action = 'Apply Now';
            } else {
                // Program is closed
                $program->status = 'Closed';
                $program->action = 'Closed';
            }
        }

        $preregistration = PreRegistration::select('id')->where('user_id',$user->id)->first();
        if(!$preregistration)
        {
            session()->flash('warning_message', 'You need to complete your pre-registration to apply for programs in the future. Click to pre-register <a href="' . route('pre-registration') . '">here</a>.');
        }

        return view('user.home', compact('user', 'programs', 'recentUpdates'));
    }

}
