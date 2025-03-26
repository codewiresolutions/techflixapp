<?php

namespace App\Http\Controllers\admin;

use App\Models\CareerJob;
use App\Models\JobApplicant;
use Illuminate\Http\Request;
use App\Traits\CareerJobTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CareerJobsController extends Controller
{
    use CareerJobTrait;

    protected $model = CareerJob::class;

    protected function validationRules(): array
    {
        return [
            'added_by' => 'required|exists:users,id', // Ensure the user exists in the users table
            'title' => 'required|string|max:255', // The title is required, should be a string, and not exceed 255 characters
            'type' => 'required|string|max:255', // The type is required and should not exceed 255 characters
            'sub_title' => 'required|string|max:255', // The subtitle is required and should not exceed 255 characters
            'description' => 'required|string', // The description is required and should be a string (can be long text)
            'experience' => 'required|string', // The experience is required and should be a string (can be long text)
            'exp_type' => 'nullable|string|max:255', // The experience type is optional but should be a string if provided
            'status' => 'required|boolean', // The status is required and should be a boolean value
            'expire_date' => 'nullable|date|after:today', // The expire_date is optional, but if provided, it should be a valid date in the future
        ];
    }

    // Method to handle index request, likely returns a list of resources (jobs or other entities)
    public function index()
    {
        return $this->getindex();
    }

// Method to handle the create request, typically to show a form for creating a new resource
    public function create()
    {
        return $this->redirectcreate();
    }

// Method to handle storing a new resource (job) in the database
    public function store(Request $request)
    {
        return $this->jobstore($request);
    }

// Method to handle the deletion of a resource by ID
    public function destroy($id)
    {
        return $this->jobdestroy($id);
    }
    public function trashed()
    {
        $jobs = $this->model::onlyTrashed()->get();
        return view('admin.jobs.trashed', compact('jobs'));
    }

    // To restore a soft-deleted job
    public function restore($id)
    {
        $job = $this->model::withTrashed()->findOrFail($id);
        $job->restore();
        
        Session::flash('success', 'Job has been restored successfully.');
        return redirect()->route('admin.jobs.index');
    }

// Method to show the edit form for a resource (job)
    public function edit($id)
    {
        return $this->jobedit($id);
    }

// Method to handle updating an existing resource (job) by its ID
    public function update(Request $request, $id)
    {
        return $this->jobupdate($request, $id);
    }

// Method to handle the job application process
    public function jobApply(Request $request)
    {
        return $this->handleJobApplication($request);
    }
    public function jobList()
    {
        $jobs = CareerJob::where('status',1)->orderBy('id', 'desc')->get();
        return view('website.pages.jobs.index', compact('jobs'));
    }
    public function jobapplicantdestroy($id)
    {
        return $this->deleteApplicaant($id);
    }
}
