<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }


    public function guest()
    {
        $data['blogs'] = Blog::all();
        return view('front.pages.home', $data);
    }
}
