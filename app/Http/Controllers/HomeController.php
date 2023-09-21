<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Blog;
use App\Models\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }


    public function guest()
    {
        $data['blogs'] = Blog::all();
        $data['programs'] = Program::all();
        return view('front.pages.home', $data);
    }


    public function regular()
    {
        $user = Auth::user();

        // Fetch the user's application (if exists)
        $application = $user->application;
    
        // Get some application statistics (you can replace this with your actual logic)
        $totalApplications = Application::count();
        $approvedApplications = Application::where('status', 'approved')->count();
        $pendingApplications = Application::where('status', 'pending')->count();
        $rejectedApplications = Application::where('status', 'rejected')->count();
    
        // Fetch recent blog updates
        $recentUpdates = Blog::latest()->limit(3)->get();
    
    
        // Get upcoming programs
        $upcomingPrograms = [
            [
                'name' => 'Student Loan',
                'date' => '2023-08-10',
                'status' => 'upcoming',
                'action' => 'Apply Now',
            ],
            [
                'name' => 'Scholarship',
                'date' => '2023-09-05',
                'status' => 'coming_soon',
                'action' => 'Coming Soon',
            ],
            [
                'name' => 'NECO/WAEC/JAMB',
                'date' => '2023-09-15',
                'status' => 'closed',
                'action' => 'Closed',
            ],
            [
                'name' => 'Vocational training',
                'date' => '2023-09-15',
                'status' => 'closed',
                'action' => 'Closed',
            ],
            [
                'name' => 'MSMEs Grant',
                'date' => '2023-09-15',
                'status' => 'closed',
                'action' => 'Closed',
            ],
            [
                'name' => 'Digital Literacy',
                'date' => '2023-09-15',
                'status' => 'closed',
                'action' => 'Closed',
            ],
            [
                'name' => 'FarmRise Program',
                'date' => '2023-09-15',
                'status' => 'closed',
                'action' => 'Closed',
            ],
        ];
    
        // Check if the program is open for application
        foreach ($upcomingPrograms as &$program) {
            $programDate = Carbon::parse($program['date']);
            $now = Carbon::now();
            
            if ($programDate->isFuture()) {
                // Program is upcoming
                $program['status'] = 'upcoming';
                $program['action'] = 'Apply Now';
            } elseif ($programDate->isToday()) {
                // Program is today (closing today)
                $program['status'] = 'closing_today';
                $program['action'] = 'Apply Now';
            } else {
                // Program is closed
                $program['status'] = 'closed';
                $program['action'] = 'Closed';
            }
        }
    
        return view('user.home', compact('user', 'application', 'totalApplications', 'approvedApplications', 'pendingApplications', 'rejectedApplications', 'upcomingPrograms', 'recentUpdates'));
    }
    
}
