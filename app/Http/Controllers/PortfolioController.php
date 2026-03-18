<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::all()->groupBy('category');
        $projects = Project::latest()->get();
        $experiences = Experience::latest()->get();
        $certifications = Certification::latest()->get();

        return view('portfolio', compact('profile', 'skills', 'projects', 'experiences', 'certifications'));
    }
}
