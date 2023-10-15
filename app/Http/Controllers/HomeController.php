<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Blog;
use App\Models\Program;
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
        $programs = Program::all(); // Fetch all programs from the database

        // Check if the program is open for application
        // Check if the program is open for application
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

        return view('user.home', compact('user', 'application', 'totalApplications', 'approvedApplications', 'pendingApplications', 'rejectedApplications', 'programs', 'recentUpdates'));
    }

}
