<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use App\Models\Service;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $complaints = Complaint::all();
        } elseif ($user->hasRole('staff')) {
            $complaints = Complaint::with('staff')->whereHas('staff', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        } else {
            $complaints = Complaint::where('user_id', $user->id)->get();
        }
        return view('complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('status', true)->get();
        return view('complaints.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        // Create a new complaint for the authenticated user
        Auth::user()->complaints()->create($request->all());
        return redirect()->route('complaints.index')->with('success', 'Complaint submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        $services = Service::all();
        $staffs = Staff::where('service_id', $complaint->service_id)->get();
        return view('complaints.edit', compact('services', 'staffs', 'complaint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $roleData = $request->only(['staff_id', 'details', 'status']);
        } elseif ($user->hasRole('staff')) {
            $roleData = $request->only(['status']);
        } else {
            // Check if the authenticated user is the owner of the post
            if ($complaint->user_id !== $user->id) {
                return redirect()->route('complaints.index')->with('error', 'Unauthorized action.');
            }
            $roleData = $request->only(['details']);
        }
        // Update the complaint with the validated data
        $commonData = $request->only(['user_id']);
        $updateData = array_merge($commonData, $roleData);
        $complaint->update($updateData);
        return redirect()->route('complaints.index')->with('success', 'complaint updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'complaint deleted successfully');
    }
}

