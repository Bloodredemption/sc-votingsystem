<?php

namespace App\Http\Controllers;

use App\Models\Personnels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DataTables;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.personnels.index');
        // return $dataTable->render('auth.personnel.admin.personnels');

        // if(\request()->ajax()){
        //     $data = Personnels::latest()->get();
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('auth.personnel.admin.personnels');
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
