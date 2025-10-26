<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        // Pega as 15 vagas mais recentes
        $jobs = Job::latest()->take(15)->get();

        // Passa as vagas para a view 'home'
        return view('home', compact('jobs'));
    }
}
