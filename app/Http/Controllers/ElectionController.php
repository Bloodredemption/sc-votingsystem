<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::latest()->paginate(5);

        if (session()->has('fullName')) {
            return view('admin.election.index', compact('elections'));
        }

        return redirect()->route('personnel.login')
            ->withErrors([
                'username' => 'Please login to access.',
            ])->withInput(['username' => request()->input('username'), 'password' => request()->input('password')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $elections = Election::latest();
        // $adminID = $elections->id;
        // // session(['fullName' => $fullName]); 

        // return view('admin.election.create', compact('adminID'));

        return view('admin.election.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        

        $request->validate([
            'electionTitle' => 'required',
            'schoolyear' => 'required',
            'department' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'status' => 'required',
            'personnel_id' => 'required',
        ]);
        
        Election::create($request->all());
         
        return redirect()->route('election.index')
                        ->with('success','Election created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        //
    }
}
