<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Personnels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('loginID');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    // public function personnelLogin()
    // {
    //     return view('auth.personnel.login');
    // }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'loginID' => 'required'
        ]);

        // Check if a user with the provided loginID exists
        $user = User::where('loginID', $credentials['loginID'])->first();

        if ($user) {
            // User with loginID exists, log in the user
            auth()->login($user); // Log in the user
            $request->session()->regenerate();

            // Fetch the user's details from tbl_voter
            $voter = User::where('loginID', $credentials['loginID'])->first();

            // Concatenate the user's full name
            $fullName = $voter->voterFN . ' ' . $voter->voterMN . ' ' . $voter->voterLN;

            // Store the full name in the session
            $request->session()->put('fullName', $fullName);

            // Redirect to the dashboard with success message
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        // User with loginID does not exist, redirect back with error message
        return back()->withErrors(['loginID' => 'Your provided credentials do not match in our records.']);
    }

    // public function personnelauthenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);

    //     // Check if personnel with the provided username exists
    //     $personnel = Personnel::where('username', $credentials['username'])->first();

    //     if ($personnel) {
    //         // Personnel with username exists
    //         if ($credentials['password'] === $personnel->password) {
    //             // Password matches

    //             if ($personnel->userType === 'admin') {
    //                 // User is an admin, redirect to admin dashboard
    //                 return redirect()->route('personnel.admin.dashboard');
    //             } elseif ($personnel->userType === 'facilitator') {
    //                 // User is a facilitator, redirect to facilitator dashboard
    //                 return redirect()->route('personnel.facilitator.dashboard');
    //             }
    //         }
    //     }

    //     // Username, password, or userType is incorrect, redirect back with error message
    //     return back()->withErrors(['username' => 'Invalid username, password, or user type.']);
    // }

    // public function adminDashboard()
    // {
    //     // Add logic for the admin dashboard here
    //     return view('auth.personnel.admin.dashboard'); // For example, return the admin dashboard

    // }
        
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('voter.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'loginID' => 'Please login to access the dashboard.',
        ])->onlyInput('loginID');
    }
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

}