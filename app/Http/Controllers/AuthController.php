<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }
    public function registerIndex()
    {
        return view('admin.auth.register');
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 201,
            'message' => 'Registration successful',
            'redirect' => route('login', [
                'redirectTo' => $request->input('redirectTo'),
                'program' => $request->input('program'),
            ]),
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email_or_phone' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $this->getCredentials($request);
        $rememberMe = $request->filled('rememberMe');
    
        try {
            if (Auth::attempt($credentials, $rememberMe)) {
                // Check if the 'redirectTo' and 'program' parameters are provided in the query string
                $redirectTo = $request->input('redirectTo');
                $program = $request->input('program');
    
                // Define the default redirect route
                $defaultRoute = $this->getRedirectRoute();
    
                // If both 'redirectTo' and 'program' are provided, construct the URL with parameters
                if ($redirectTo && $program) {
                    $redirectUrl = route($redirectTo, ['program' => $program]);
                } else {
                    // If not provided, use the default route
                    $redirectUrl = route($defaultRoute);
                }
    
                if ($request->ajax()) {
                    return response()->json(['success' => true, 'redirect_url' => $redirectUrl]);
                } else {
                    return redirect()->to($redirectUrl);
                }
            } else {
                throw ValidationException::withMessages([
                    'login_error' => 'Invalid credentials.',
                ]);
            }
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            } else {
                return redirect()->back()->withErrors($e->errors())->withInput()->with('error_message', 'Invalid credentials.');
            }
        }
    }
    

    protected function getCredentials(Request $request)
    {
        $field = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return [
            $field => $request->email_or_phone,
            'password' => $request->password,
        ];
    }

    protected function getRedirectRoute()
    {
        $userType = auth()->user()->user_type;

        return $userType === 'admin' ? 'admin.home' : 'apply';
    }

    protected function getRedirectUrl()
    {
        return route($this->getRedirectRoute());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
