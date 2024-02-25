<?php

namespace App\Http\Controllers;

use App\Models\Personnels;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('admin.personnels.index');
        
    // }
    
    public function index()
    {
        $adminPersonnels = Personnels::where('userType', 'admin')->latest()->paginate(5);
        $facilitatorPersonnels = Personnels::where('userType', 'facilitator')->latest()->paginate(5);
        
        // return view('admin.personnels.index', compact('adminPersonnels', 'facilitatorPersonnels'));

        if (session()->has('fullName')) {
            return view('admin.personnels.index', compact('adminPersonnels', 'facilitatorPersonnels'));
        }

        return redirect()->route('personnel.login')
            ->withErrors([
                'username' => 'Please login to access.',
            ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
    }

    public function votesIndex()
    {
        return view('admin.votes.index');
    }

    public function electionIndex()
    {
        return view('admin.election.index');
    }

    public function votersIndex()
    {
        return view('admin.voters.index');
    }

    public function candidatesIndex()
    {
        return view('admin.candidates.index');
    }

    public function reportsIndex()
    {
        return view('admin.reports.index');
    }

    public function aboutIndex()
    {
        return view('admin.about.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.personnels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'userType' => 'required',
        ]);
        
        Personnels::create($request->all());
         
        return redirect()->route('personnels.index')
                        ->with('success','Personnel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnels $personnel): View
    {
        return view('admin.personnels.show',compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnels $personnel): View
    {
        return view('admin.personnels.edit',compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnels $personnel): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'userType' => 'required',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnels.index')
                        ->with('success','Personnel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnels $personnel): RedirectResponse
    {
        $personnel->delete();
        
        return redirect()->route('personnels.index')
            ->with('success', $personnel->name . ' deleted successfully.');
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
                $status = $personnel->status;
                session(['fullName' => $fullName]);  
                session(['status' => $status]);  
               
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
        return back()->withErrors([
            'username' => 'Invalid username.',
            'password' => 'Invalid password.'
        ]);
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
        if (session()->has('fullName')) {
            return view('admin.dashboard.index');
        }

        return redirect()->route('personnel.login')
            ->withErrors([
                'username' => 'Please login to access the dashboard.',
            ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
        
    }

    public function facilitatorDashboard()
    {
        if (session()->has('fullName')) {
            return view('personnel.facilitator.dashboard');
        }

        return redirect()->route('personnel.login')
            ->withErrors([
                'username' => 'Please login to access the dashboard.',
            ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
        
    }
    
    public function faciAbout()
    {
        return view('auth.personnel.facilitator.about');
    }

    public function faciVoters()
    {
        return view('auth.personnel.facilitator.voters');
    }

    public function faciCandidates()
    {
        return view('auth.personnel.facilitator.candidates');
    }
    
}
