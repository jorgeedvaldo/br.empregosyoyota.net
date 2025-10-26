<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
     public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')
            ->paginate(30);

        return view('jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $recentJobs = Job::orderBy('created_at', 'desc')->take(5)->get();

        return view('jobs.job-detail', compact('job', 'recentJobs'));
    }
}
