<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Counter;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Resume;
use App\Models\Admin\ServiceCategory;
use App\Models\Admin\Skill;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models for Landing Site
        $blogs_count = Blog::all()->count();
        $resumes_count = Resume::all()->count();
        $skills_count = Skill::all()->count();
        $counters_count = Counter::all()->count();
        $teams_count = Team::all()->count();
        $testimonials_count = Testimonial::all()->count();
        $services_count = ServiceCategory::all()->count();
        $portfolios_count = Portfolio::all()->count();
        $pages_count = Page::all()->count();

        return view('admin.dashboard', compact('blogs_count', 'resumes_count', 'skills_count',
            'services_count', 'counters_count', 'teams_count', 'testimonials_count', 'pages_count', 'portfolios_count'));

    }

}
