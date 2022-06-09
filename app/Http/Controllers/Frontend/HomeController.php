<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\AboutSection;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\BlogSection;
use App\Models\Admin\CallToAction;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Counter;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\FixedContent;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\Resume;
use App\Models\Admin\ResumeSection;
use App\Models\Admin\ServiceCategory;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillSection;
use App\Models\Admin\Social;
use App\Models\Admin\TawkTo;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use App\Models\Admin\InfoList;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get site language
        $language = getSiteLanguage();

        // Default values
        $blog_limit = 6;

        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $tawk_to = TawkTo::first();
        $socials = Social::where('status', 1)->get();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();
        $about_section = AboutSection::where('language_id', $language->id)->first();
        $about = About::where('language_id', $language->id)->first();
        $info_lists = InfoList::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $resume_section = ResumeSection::where('language_id', $language->id)->first();
        $resumes = Resume::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $skill_section = SkillSection::where('language_id', $language->id)->first();
        $skills = Skill::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $counters = Counter::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();
        $services = ServiceCategory::where('language_id', $language->id)
            ->where('status', 'published')
            ->orderBy('order', 'asc')
            ->get();
        $portfolio_categories = PortfolioCategory::orderBy('order', 'asc')
            ->where('language_id', $language->id)
            ->where('status', 'published')
            ->get();
        $portfolio_section = PortfolioSection::where('language_id', $language->id)->first();
        $portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolios.language_id', $language->id)
            ->where('portfolio_categories.status', 'published')
            ->where('portfolios.status', 'published')
            ->orderBy('portfolios.order', 'asc')
            ->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $team_section = TeamSection::where('language_id', $language->id)->first();
        $teams = Team::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $call_to_action = CallToAction::where('language_id', $language->id)->first();
        $blog_section = BlogSection::where('language_id', $language->id)->first();
        $blog_paginate = BlogPaginate::first();

        if (isset($blog_paginate)) {
            $blog_limit = $blog_paginate->homepage_item;
        }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 'published')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->take($blog_limit)
            ->get();

        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 'enable')->first();

        $color_option = ColorOption::first();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();


        return view('frontend.home.index', compact('site_info', 'google_analytic', 'tawk_to', 'socials',
            'fixed_content', 'about_section', 'about', 'info_lists', 'resume_section', 'resumes', 'skill_section',
            'skills', 'counters', 'service_section', 'services', 'portfolio_categories',
            'portfolio_section', 'portfolios', 'testimonial_section', 'testimonials', 'team_section', 'teams',
            'call_to_action', 'blog_section', 'recent_posts', 'contact_section', 'contacts', 'header_pages',
            'footer_pages', 'external_url', 'color_option'));
    }

}
