<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Blog;
use App\Models\PopUpNotification;
use App\Models\PreRegistration;
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
