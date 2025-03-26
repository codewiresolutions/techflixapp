<?php

namespace App\Traits;
use App\Models\JobApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

trait CareerJobTrait
{

public function getindex()
    {
        $model=$this->model;
        $job=$model::with('user')->get();
        return view('admin.pages.jobs.index',compact('job'));
    }
    public function redirectcreate()
    {
        return view('admin.pages.jobs.create');
    }
    public function jobstore($request)
    {
        $model = $this->model;
        $data = $request->validate($this->validationRules());
        $item = $model::create($data);
        Session::flash('success', 'job has been saved successfully.');
        return redirect()->route('admin.jobs.index');

    }
    public function jobdestroy($id)
    {
        $model = $this->model;
        $job = $model::findOrFail($id);

        $job->delete();
        Session::flash('success', 'job has been Delete successfully.');
        return redirect()->route('admin.jobs.index');

    }
    public function jobedit($id)
    {
        $model = $this->model; // Assuming this is a valid model class
        $job = $model::findOrFail($id);  // Fetch the item by ID
        return view('admin.pages.jobs.edit',compact('job'));

    }
    public function jobupdate($request, $id)
    {
        $model = $this->model;
        $item = $model::findOrFail($id);

        $data = $request->validate($this->validationRules($id));

        $updated = $item->update($data);

        if ($updated) {
            Session::flash('success', 'job has been update successfully.');
        } else {
            Session::flash('success', 'job failed update successfully.');
        }

        return redirect()->route('admin.jobs.index');
    }

    public function handleJobApplication(Request $request)
{
    $job_id = $request["jod_id"];
    
    // Validation rules
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string|max:255',
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // 2MB max
        'portfolio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096', // 4MB max
        'contact_number' => 'required|string|max:15',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    // Handle file uploads with custom filenames
    $resumePath = $this->uploadFile(
        $request->file('resume'),
        'resumes',
        'resume_' . date('YmdHis')
    );

    $portfolioPath = null;
    if ($request->hasFile('portfolio')) {
        $portfolioPath = $this->uploadFile(
            $request->file('portfolio'),
            'portfolios',
            'portfolio_' . date('YmdHis')
        );
    }

    // Create job applicant record
    $applicant = JobApplicant::create([
        'name' => $request->input('full_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('contact_number'),
        'job_id' => $job_id,
        'cv' => $resumePath,
        'portfolio' => $portfolioPath,
    ]);

    return response()->json([
        'message' => 'Application submitted successfully!',
        'resume_url' => asset('storage/' . $resumePath),
        'portfolio_url' => $portfolioPath ? asset('storage/' . $portfolioPath) : null,
        'applicant_id' => $applicant->id,
    ], 200);
}
private function uploadFile($file, $directory, $prefix)
{
    $disk = 'public';
    $extension = $file->getClientOriginalExtension();
    $filename = $prefix . '_' . uniqid() . '.' . $extension;
    
    // Store the file and return the path
    return Storage::disk($disk)->putFileAs($directory, $file, $filename);
}
public function deleteApplicaant($id)
{
    $applicant = JobApplicant::find($id);
            
    if (!$applicant) {
        return response()->json([
            'message' => 'Applicant not found'
        ], 404);
    }

    // Store paths for response before deletion
    $deletedFiles = [
        'resume' => $applicant->cv,
        'portfolio' => $applicant->portfolio
    ];

    // Delete resume if it exists
    if ($applicant->cv && Storage::disk('public')->exists($applicant->cv)) {
        Storage::disk('public')->delete($applicant->cv);
    }

    // Delete portfolio if it exists
    if ($applicant->portfolio && Storage::disk('public')->exists($applicant->portfolio)) {
        Storage::disk('public')->delete($applicant->portfolio);
    }

    // Delete the applicant record
    $applicant->delete();


    return redirect()->back()->with('success', 'Job applicant deleted successfully');
}


}
