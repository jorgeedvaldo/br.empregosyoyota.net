<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Store a new job via API.
     */
    public function store(Request $request)
    {
        // ✅ Validate the request
        $validator = Validator::make($request->all(), [
            'title'    => 'required|string|max:255',
            'company'  => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content'  => 'required|string',
            'apply'    => 'required|string',
            'status'   => 'required|in:draft,published',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // ✅ Define a default image (e.g., stored in /public/images)
        $defaultImage = '/jobs/images/default.jpg';

        // ✅ Create the job
        $job = Job::create([
            'title'    => $request->title,
            'slug'     => 'my-slug', // Temporary slug; will be updated in the model's boot method
            'company'  => $request->company,
            'location' => $request->location,
            'content'  => $request->content,
            'apply'    => $request->apply,
            'status'   => $request->status,
            'image'    => $defaultImage,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Job created successfully.',
            'data'    => $job,
        ], 201);
    }
}