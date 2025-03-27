<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\CareerJob;
use Illuminate\Http\Request;

class JobApplicant extends Controller
{

    public function jobApplicants()
    {
        $jobApplicants = \App\Models\JobApplicant::with('job')->orderBy('id','desc')->get();

        return view('admin.pages.jobs.applicants', compact('jobApplicants'));
    }
    public function downloadResume($filename)
    {
        // Make sure the file is publicly accessible
        $filePath = storage_path('app/public/resume/' . $filename);

        // Check if file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return abort(404, 'File not found');
    }
    public function downloadPortfolio($filename)
    {
        // Make sure the file is publicly accessible
        $filePath = storage_path('app/portfolio/' . $filename);

        // Check if file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return abort(404, 'File not found');
    }
}
