<?php

namespace App\Http\Controllers;

use App\Models\Personnels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.personnel.admin.personnels');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnels $personnels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnels $personnels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnels $personnels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnels $personnels)
    {
        //
    }

    public function personnelLogin()
    {
        return view('auth.personnel.login');
    }

    public function personnelauthenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Check if personnel with the provided username exists
        $personnel = Personnels::where('username', $credentials['username'])->first();

        if ($personnel) {
            // Personnel with username exists
            if ($credentials['password'] === $personnel->password) {
                // Password matches
                $fullName = $personnel->name;
                session(['fullName' => $fullName]);

                if ($personnel->userType === 'admin') {
                    // User is an admin, redirect to admin dashboard
                    return redirect()->route('personnel.admin.dashboard');
                } elseif ($personnel->userType === 'facilitator') {
                    // User is a facilitator, redirect to facilitator dashboard
                    return redirect()->route('personnel.facilitator.dashboard');
                }
            }
        }

        // Username, password, or userType is incorrect, redirect back with error message
        return back()->withErrors(['username' => 'Invalid username, password, or user type.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('personnel.login');
    }
 
    public function adminDashboard()
    {
        // if (Auth::check()) {
        //     return view('auth.personnel.admin.dashboard');
        // }

        return view('auth.personnel.admin.dashboard');

        // return redirect()->route('personnel.login')
        //     ->withErrors([
        //         'username' => 'Please login to access the dashboard.',
        //     ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
    }

    public function facilitatorDashboard()
    {
        // if (Auth::check()) {
        //     return view('auth.personnel.facilitator.dashboard');
        // }

        return view('auth.personnel.facilitator.dashboard');
        
        // return redirect()->route('personnel.login')
        //     ->withErrors([
        //         'username' => 'Please login to access the dashboard.',
        //     ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
    }
}
