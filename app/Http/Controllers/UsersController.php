<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('user_type','regular')->get();

        return view('admin.users.index', compact('users'));
    }
    public function adminIndex()
    {
        $users = User::where('user_type','admin')->get();

        return view('admin.users.admin', compact('users'));
    }




public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'nullable|email|unique:users,email',
        'phone' => 'required|string|unique:users,phone',
        'password' => 'required|string',
    ]);
    

    // Create a new administrator
    $admin = new User(); // Replace 'Admin' with your actual model name
    $admin->name = $request->input('name');
    $admin->user_type = 'admin';
    $admin->email = $request->input('email');
    $admin->phone = $request->input('phone');
    $admin->password = Hash::make($request->input('password'));

    // Save the administrator
    $admin->save();

    // Redirect back with a success message
    return redirect()->route('users.admin.index')->with('success', 'Administrator created successfully');
}


}
